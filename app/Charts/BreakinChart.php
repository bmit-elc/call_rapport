<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use app\Models\CallAccounting;
use Illuminate\Support\Facades\DB;

class breakinChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $thing = [1,20,30];
        $query = [DB::table('CallAccounting')->where('SubscriberName', 'Service 21')->count()];
        return $this->chart->pieChart()
            ->setTitle('Break in Chart')
            ->setSubtitle('testing')
            ->setDataset( 
                
                // CallAccounting::where('SubscriberName', '=', 'Quadient franz.')->count()
                $query
                
            )
            ->setLabels(['Player 7', 'Player 10']);
    }
}
