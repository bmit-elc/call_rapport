<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Charts\BreakinChart;
use Illuminate\Routing\Controller;


class breakinChartController extends Controller
{
    public function indexChart(breakinChart $chart)
    {
        
        return view('chart', ['chart' => $chart->build()]);   
    }
}
