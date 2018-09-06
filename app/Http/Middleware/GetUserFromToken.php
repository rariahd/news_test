<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean Tymon <tymon148@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Http\Middleware;

use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class GetUserFromToken extends \Tymon\JWTAuth\Middleware\BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        $response = new \App\Http\Controllers\ResponseObject();

        $response->success = $response::status_failed;
        $response->code = $response::code_failed;

        if (! $token = $this->auth->setRequest($request)->getToken()) {
            $response->messages = ['Token not provided'];
            return \Response::json($response, $response::code_failed);
        }

        try {
            $user = $this->auth->authenticate($token);
        } catch (TokenExpiredException $e) {
            $response->messages = ['Token expired'];
            return \Response::json($response, $e->getStatusCode());
        } catch (JWTException $e) {
            $response->messages = ['Token invalid'];
            return \Response::json($response, $e->getStatusCode());
        }

        if (! $user) {
            $response->messages = ['User not found'];
            return \Response::json($response, $response::code_not_found);
        }

        $this->events->fire('tymon.jwt.valid', $user);

        return $next($request);
    }
}
