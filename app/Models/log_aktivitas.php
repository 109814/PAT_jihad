<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class log_aktivitas extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'name', 'kejadian'];
    protected $dates = ['date'];
}
