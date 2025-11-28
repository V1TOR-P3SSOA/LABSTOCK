<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Equipment;
use App\Models\User;

class Loan extends Model
{
    protected $fillable = ['equipment_id', 'user_id', 'borrow_date', 'return_date', 'status'];

    use HasFactory;
    public function equipment(): BelongsTo
    {
        return $this->belongsTo(Equipment::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
