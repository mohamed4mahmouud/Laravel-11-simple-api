<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_complete',
        'priority_id'
    ];

    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }
}
