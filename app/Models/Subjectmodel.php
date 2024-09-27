<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjectmodel extends Model
{
    use HasFactory;
    protected $table= "subject";
    protected $primaryKey= "id";
}
