<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'service_id',
        'subject',
        'message'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
