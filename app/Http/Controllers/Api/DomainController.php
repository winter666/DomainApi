<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function __construct()
    {
        /**
         * Проблема была в том, что нужно было сопоставить вторым аргументом
         * указатель с маршрута (я решил переименовать в domain)
         */
        $this->authorizeResource(Domain::class, 'domain');
    }

    public function update(Request $request, Domain $domain)
    {
        $domain->update([
            'name' => $request->post('name'),
        ]);

        return $domain;
    }
}
