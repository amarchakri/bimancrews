<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $table = 'emails';
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
