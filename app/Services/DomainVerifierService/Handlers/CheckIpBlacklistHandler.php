<?php


namespace App\Services\DomainVerifierService\Handlers;


use App\Models\Domain;
use App\Services\DomainVerifierService\BaseHandler;

class CheckIpBlacklistHandler extends BaseHandler
{

    public function verify(?Domain $domain): bool
    {
        return $domain && $domain
            ->blockedIps
            ->where('name', $this->request->ip())
            ->isEmpty();
    }
}
