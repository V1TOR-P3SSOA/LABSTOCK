<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reagent extends Model
{
   protected $fillable = ['name', 'formula', 'quantity', 'unit'];
}
