<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $lesson_id)
 */
class Answer extends Model
{
    protected $fillable = ['option_id', 'lesson_id', 'user_id', 'question_id', 'correct_answer', 'false_answer'];

}
