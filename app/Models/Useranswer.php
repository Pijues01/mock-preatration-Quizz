<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Useranswer extends Model
{
    use HasFactory;
    protected $table = 'user_exam_info';
    protected $primaryKey = 'id';

}
