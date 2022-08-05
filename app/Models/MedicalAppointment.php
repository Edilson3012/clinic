<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalAppointment extends Model
{
    use HasFactory;

    protected $table = 'medical_appointment';

    public $timestamps = true;

    protected $fillable = [
        'name', 'email', 'date_appointment', 'description', 'state'
    ];

    public static function search($filters = null)
    {
        $query = MedicalAppointment::query();

        if($filters['name']){
            $query->where('name', 'LIKE', "%{$filters['name']}%");
        }
        if($filters['email']){
            $query->where('email', 'LIKE', "%{$filters['email']}%");
        }
        if($filters['date_start']){
            $query->where('date_appointment', '>=', "%{$filters['date_start']}%");
        }
        if($filters['date_end']){
            $query->where('date_appointment', '<=', "%{$filters['date_end']}%");
        }

        $results = $query->get();

        return $results;
    }
}
