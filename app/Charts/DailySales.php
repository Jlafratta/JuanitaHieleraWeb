<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Ticket;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

use Carbon\Carbon;

class DailySales extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {


        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $days = (Carbon::create($year, $month)->daysInMonth); //Calculo cantidad de dias del mes actual

        $daysCount = array();
        for($i=1; $i<=$days; $i++){     //Agrego 1 a 1 los nros de dia al array que muestra la info en el eje X del chart
            array_push($daysCount, $i);
        }

        $dates = Ticket::getCurrentMonthSales();    //traigo las ventas por dia, del mes actual

        $dailySales = array();
        for($i=1; $i<=$days; $i++){     //cargo con 0 todo el array de ventas
            array_push($dailySales, 0);
        }

        foreach($dates as $date){   // recorro las ventas y las cargo en el array de ventas segun el dia
            $dailySales[($date->day)-1] = $date->total;
        }

        return Chartisan::build()
            ->labels($daysCount)
            ->dataset('Hielo', $dailySales);
    }
}