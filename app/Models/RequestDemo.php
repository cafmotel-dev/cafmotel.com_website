<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestDemo extends Model
{
    use HasFactory;
    protected $table = "request_demo"; // Set the table name for the model

    protected $fillable = ['email'];
}
