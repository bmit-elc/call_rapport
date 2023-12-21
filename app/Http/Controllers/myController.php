<?php

namespace App\Http\Controllers;

use App\Models\CallAccounting;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class myController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function zeigeBenutzer()
    {
        // Controller-Code hier...
    }
    public function index()
    {
        // Read - Display a list of tasks
        // $daten = CallAccounting::paginate(10);
        // return view('welcome', compact('daten'));
        return view('welcome', [
            'daten' => DB::table('CallAccounting')->orderBy('Date')->cursorPaginate(10)
        ]);       
    }
   
}
