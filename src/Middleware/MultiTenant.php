<?php

namespace MHNassar\MultiTenant\Middleware;

use Closure;

class MultiTenant
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
        $url = explode('.', parse_url($request->url(), PHP_URL_HOST));
        $connectionsArray = config('database.connections');

        if (count($url) > 1 && array_key_exists($url[0], $connectionsArray)) {
            $connection = $url[0];
            session(['subDomain' => $connection]);

        } else {
            $connection = env('DB_CONNECTION');
        }
        \Illuminate\Support\Facades\Config::set('database.default', $connection);

        return $next($request);
    }


}
