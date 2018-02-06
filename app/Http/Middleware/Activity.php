<?php
/**
 * namespace App\Http\Middleware\Activity
 * User: weixuan
 * Date: 2018/2/6
 * Time: 18:14
 * Copyright © ENUCP Inc.All rights reserved.
 */

namespace App\Http\Middleware;


use Closure;

class Activity
{
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

?>