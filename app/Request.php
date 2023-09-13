<?php

namespace App;

use App\Models\Domain;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Log;

class Request extends HttpRequest
{
    public function domain(): ?Domain
    {
        return Domain::query()->with('blockedIps')->firstWhere('name', $this->getHost());
    }
}
