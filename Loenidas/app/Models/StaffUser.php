<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffUser extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "firstname",
        "lastname",
        "role",
        "profile",
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
