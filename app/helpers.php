<?php

use Carbon\Carbon;
use Illuminate\Contracts\Auth\Factory as AuthFactory;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Laravel\Lumen\Application;
use Laravel\Lumen\Routing\UrlGenerator;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Contracts\Auth\Access\Gate;

if (!function_exists('public_path')) {
    /**
     * Get the path to the public folder.
     *
     * @param  string  $path
     * @return string
     */
    function public_path($path = '')
    {
        return rtrim(app()->basePath('public/' . $path), DIRECTORY_SEPARATOR);
    }
}


if (!function_exists('auth')) {
    /**
     * Get the available auth instance.
     *
     * @param  string|null  $guard
     * @return \Illuminate\Contracts\Auth\Factory|\Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    function auth($guard = null)
    {
        if (is_null($guard)) {
            return app(AuthFactory::class);
        }

        return app(AuthFactory::class)->guard($guard);
    }
}

if (!function_exists('request')) {
    /**
     * Get an instance of the current request or an input item from the request.
     *
     * @param  array|string  $key
     * @param  mixed   $default
     * @return \Illuminate\Http\Request|string|array
     */
    function request($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('request');
        }

        if (is_array($key)) {
            return app('request')->only($key);
        }

        $value = app('request')->__get($key);

        return is_null($value) ? value($default) : $value;
    }
}
