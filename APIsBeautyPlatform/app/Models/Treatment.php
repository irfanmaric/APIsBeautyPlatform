<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Treatment extends Model
{
    use HasFactory, SoftDeletes;

    protected  $table =  "treatment";
    protected $hidden = ['pivot'];

    protected $fillable= [
        'price',
        'Duration',
        'Description'
    ];
}
