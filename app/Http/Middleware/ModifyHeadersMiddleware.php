<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Class ModifyHeadersMiddleware
 * @package App\Http\Middleware
 * namespace App\Http\Middleware\ModifyHeadersMiddleware
 * User: weixuan
 * Date: 20180206
 * Time: 10:15
 * Copyright © ENUCP Inc.All rights reserved.
 */
class ModifyHeadersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->header('Access-Control-Allow-Origin', '*');
        $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Cookie, Accept');
        $response->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, OPTIONS');
        $response->header('Access-Control-Allow-Credentials', 'true');
        return $response;
    }
}
