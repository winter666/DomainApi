<?php


namespace App\Services\DomainVerifierService;


use App\Request;

abstract class BaseHandler implements IDomainHandler
{
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
