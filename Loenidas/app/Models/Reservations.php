<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    use HasFactory;
    protected $fillable = [
        'phoneNum',
        'date',
        'time',
        'people',
        'user_id',
        'table_id',
        'status',
        'table'
    ];

    public function orders()
    {
        return $this->hasMany(Orders::class, 'reservation_id');
    }
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function table()
    {
        return $this->belongsTo(Tables::class);
    }
    
}
