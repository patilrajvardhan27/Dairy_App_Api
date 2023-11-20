<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addcustomer extends Model
{ 
    protected $table = 'addcustomers'; // Match the table name
    protected $fillable =[
        
       'customerpid', 'name', 'phone', 'address', 
    ];
}



