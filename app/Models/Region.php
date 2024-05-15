<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'latitude', 'longitude', 'county_id'];

    public function county()
    {
        return $this->belongsTo(County::class);
    }

    public function calculateDistance($centerLat, $centerLon, $regionLat, $regionLon)
    {
            $earthRadius = 6371; // Earth's radius in kilometers

            $lat1 = deg2rad($centerLat);
            $lon1 = deg2rad($centerLon);
            $lat2 = deg2rad($regionLat);
            $lon2 = deg2rad($regionLon);

            $deltaLat = $lat2 - $lat1;
            $deltaLon = $lon2 - $lon1;

            $a = sin($deltaLat / 2) * sin($deltaLat / 2) + cos($lat1) * cos($lat2) * sin($deltaLon / 2) * sin($deltaLon / 2);
            $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

            $distance = $earthRadius * $c;

            // Truncate the distance to 2 decimal places
            $truncatedDistance = number_format($distance, 2);

            return $truncatedDistance;
    }




}
