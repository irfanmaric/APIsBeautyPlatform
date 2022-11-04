<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreatmentTherapist extends Model
{
    use HasFactory;
    protected  $table =  "treatmenttherapist";

    protected $fillable= [
        'DateTime',
        'UserID',
        'treatmenttherapistID'
    ];
    public function therapists(){
        return $this->belongsToMany(Therapist::class, 'treatmenttherapist', 'TherapistID', 'id');
    }
    public function treatments(){
        return $this->belongsToMany(Treatment::class, 'treatmenttherapist', 'TreatmentID', 'id');
    }
}
