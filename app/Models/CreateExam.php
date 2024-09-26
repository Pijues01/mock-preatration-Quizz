<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateExam extends Model
{
    use HasFactory;
    protected $table= "create_exam";
    protected $primaryKey= "id";
}
