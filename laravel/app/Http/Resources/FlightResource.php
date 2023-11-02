<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FlightResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $flightsPath = [];

        foreach ($this->resource as $path) {
            $flightsPath[] = array(
                'airport_id' => $path->id,
                'code_iata' => $path->code_iata,
                'code_icao' => $path->code_icao,
                'cargo_offload' => $path->cargo_offload,
                'cargo_load' => $path->cargo_load,
                'landing' => $path->landing,
                'takeoff' => $path->takeoff,
            );
        }
        return $flightsPath;
    }
}
