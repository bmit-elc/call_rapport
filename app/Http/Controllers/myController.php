<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class myController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function zeigeBenutzer()
    {
        // Controller-Code hier...
    }
}