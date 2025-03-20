<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'value', 'icon', 'status', 'type', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}