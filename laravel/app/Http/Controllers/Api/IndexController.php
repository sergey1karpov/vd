<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FlightResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * @param Request $request
     * @return FlightResource
     */
    public function getPath(Request $request): FlightResource
    {
        $paths = DB::table('flights')
            ->join('aircrafts', 'aircrafts.id', 'flights.aircraft_id')
            ->join('airports', 'airports.id', 'flights.airport_id1')
            ->where('aircrafts.tail', $request->get('tail'))
            ->whereBetween('flights.takeoff', [$request->get('date_from'), $request->get('date_to')])
            ->get();

        return new FlightResource($paths);
    }
}
