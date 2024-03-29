<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
    ];

    public function users()
    {
        $this->belongsToMany(User::class, 'user_roles');
    }
}
