<?php


namespace App\Http\Middleware;

use App\Request;
use App\Services\DomainVerifierService\IDomainHandler;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class DomainVerifier
{
    /**
     * [App\Services\DomainVerifierService\Handlers]
     */
    private const HANDLERS = [
        // ...
    ];

    public function handle(Request $request, $next)
    {
        foreach (self::HANDLERS as $handlerClass) {
            if (!(($handlerInstance = new $handlerClass($request)) instanceof IDomainHandler)) {
                Log::error("$handlerClass must be instance of ". IDomainHandler::class);
                throw new \Exception('Server error');
            }

            /**
             * @var IDomainHandler $handlerInstance
             */
            if (!$handlerInstance->verify($request->domain())) {
                return new Response('Access denied', 403);
            }
        }

        return $next($request);
    }
}
