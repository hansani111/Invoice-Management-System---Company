<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     * 
     * 
     */

     // app/Http/Kernel.php

protected $middlewareGroups = [
    'web' => [
        // Other middleware...
        \App\Http\Middleware\VerifyCsrfToken::class,
    ],
];

    protected $except = [
        //
    ];
}
