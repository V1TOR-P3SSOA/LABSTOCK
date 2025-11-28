<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Loan;

class Equipment extends Model
{
    use HasFactory;
    protected $table = 'equipments';
    protected $fillable = ['name', 'asset_code', 'status', 'last_calibration'];

    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }
}
