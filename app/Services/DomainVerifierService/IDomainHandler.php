<?php


namespace App\Services\DomainVerifierService;


use App\Models\Domain;

interface IDomainHandler
{
    public function verify(?Domain $domain): bool;
}
