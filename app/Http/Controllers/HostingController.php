<?php

namespace App\Http\Controllers;

use App\HostingRouter;
use App\Request;

class HostingController extends Controller
{

    public function getContent(Request $request, HostingRouter $router)
    {
        return $router->handle($request);
    }

    public function fallback(Request $request, HostingRouter $router)
    {
        return $router->handle($request);
    }
}
