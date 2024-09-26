<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userquestion extends Model
{
    use HasFactory;
    protected $table = 'user_question_info';
    protected $primaryKey = 'id';
}
