<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addmilk extends Model
{
    use HasFactory;
    protected $fillable =[
        'option', 'id_farmer', 'name', 'fat', 'litre', 'rate',
    ];
}
