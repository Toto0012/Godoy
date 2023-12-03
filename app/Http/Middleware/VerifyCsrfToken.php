<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'http://127.0.0.1:8000/sucursal/store',
        'http://127.0.0.1:8000/inventario/store',
        'http://127.0.0.1:8000/producto/store',
        'http://127.0.0.1:8000/inventario/index',
        '/inventario/index',
        'http://127.0.0.1:8000/inventario/update/2',
        'http://127.0.0.1:8000/api/producto/index/'
    ];
}
