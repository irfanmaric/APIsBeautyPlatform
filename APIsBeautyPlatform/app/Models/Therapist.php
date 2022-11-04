<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Therapist extends Model
{
    use HasFactory;
    protected  $table =  "therapist";
    protected $hidden = ['pivot'];

    protected $fillable= [
        'FirstName',
        'LastName',
        'VenuesID',
        'SkillTypeID',

    ];
}
