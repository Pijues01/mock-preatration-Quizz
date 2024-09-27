<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examcatmodel extends Model
{
    use HasFactory;
    protected $table= "exam_cat";
    protected $primaryKey= "id";
}
