<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{

    protected $fillable = [
        'title',
        'description',
        'state',
    ];

    public function user():BelongsTo {
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
