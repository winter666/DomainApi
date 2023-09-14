<?php


namespace App\Http\Middleware;

use App\Request;
use App\Services\DomainVerifierService\Handlers\BlockedDomainHandler;
use App\Services\DomainVerifierService\Handlers\CheckIpBlacklistHandler;
use App\Services\DomainVerifierService\IDomainHandler;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class DomainVerifier
{
    /**
     * [App\Services\DomainVerifierService\Handlers]
     */
    private const HANDLERS = [
        BlockedDomainHandler::class,
        CheckIpBlacklistHandler::class
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
                return new Response('no content');
            }
        }

        return $next($request);
    }
}
