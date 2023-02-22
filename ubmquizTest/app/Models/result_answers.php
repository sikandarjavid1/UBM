<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class result_answers extends Model
{
    use HasFactory;
    protected $table ='result_answers';
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'quiz_id',
        'question_id',
        'category_id',
        'options_id',

    ];

    public function question()
    {
        return $this->hasMany(questions::class, 'id', 'question_id');
    }
    public function options()
    {
        return $this->hasMany(options::class, 'id', 'options_id');
    }

    public function quizresult()
    {
        return $this->hasMany(results::class,'id','quiz_id');
    }

    public function category()
    {
        return $this->hasMany(question_category::class, 'id','category_id');
    }
}
