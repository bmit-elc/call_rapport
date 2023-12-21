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

    public function index()
    {

        // Subscriber-Namen aus der Datenbank abrufen
        $subscriberNames = CallAccounting::select('SubscriberName')
            ->distinct()
            ->where('SubscriberName', '!=', 'SubscriberName')
            ->whereRaw('TRIM(SubscriberName) != ""')
            ->orderBy('SubscriberName', 'ASC')
            ->pluck('SubscriberName');
    
        // HTML-Optionen für den Select-Button erstellen
        $customerOptions = [];
        foreach ($subscriberNames as $subscriberName) {
            $customerOptions[$subscriberName] = $subscriberName;
        }
    
        $selectedSubscriber = 'default'; // Set the default selected value, you can change this as needed
      
      
     // Read - Display a list of tasks
        // $daten = CallAccounting::paginate(10);
        // return view('welcome', compact('daten'));

        return view('welcome', [
            'daten' => DB::table('CallAccounting')->orderBy('Date')->cursorPaginate(10),
            'customerOptions' => $customerOptions,
            'selectedSubscriber' => $selectedSubscriber,
        ]);       
    }
   

}
