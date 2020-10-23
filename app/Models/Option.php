<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * @method static create(\App\Http\Requests\OptionRequest $request)
 */
class Option extends Model
{
    protected $fillable = [
        'option',
        'question_id',
        'optionImage',
        'answer',
        'created_by',
        'updated_by',
    ];

    public function createdUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedUser()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }


    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::creating(function ($question){
            $question->created_by = Auth::id();
        });
        static::updating(function ($question){
            $question->updated_by = Auth::id();
        });

    }

}
