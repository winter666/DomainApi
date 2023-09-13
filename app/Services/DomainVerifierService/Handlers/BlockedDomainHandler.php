<?php


namespace App\Services\DomainVerifierService\Handlers;


use App\Models\Domain;
use App\Services\DomainVerifierService\BaseHandler;

class BlockedDomainHandler extends BaseHandler
{

    public function verify(?Domain $domain): bool
    {
        return !(bool)$domain?->is_blocked;
    }
}
