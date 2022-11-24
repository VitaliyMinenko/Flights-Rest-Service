<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use UUID;
    use HasFactory;
    protected $fillable = [
        'airline_iata',
        'flight_number',
        'from_code',
        'to_code',
        'departure_date_utc',
    ];

    protected $primaryKey = 'id';
}
