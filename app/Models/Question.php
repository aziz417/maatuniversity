<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * @method static create(array $onlyGo)
 * @method static active()
 * @method static where(string $string, $id)
 */
class Question extends Model
{
    protected $fillable = [
        'lesson_id',
        'title',
        'image',
        'slug',
        'status',
        'created_by',
        'updated_by',
    ];

    public function options(){
        return $this->hasMany(Option::class);
    }

    public function AnswerQuestions(){
        return $this->hasMany(Answer::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

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
            $question->slug = Str::slug($question->title);
            $question->created_by = Auth::id();
        });
        static::updating(function ($question){
            $question->slug = Str::slug($question->title);
            $question->updated_by = Auth::id();
        });

    }

    public function scopeActive($query){
        return $query->where('status', 1);
    }
}
