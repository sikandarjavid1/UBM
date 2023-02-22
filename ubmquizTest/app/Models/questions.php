<?php

namespace App\Models;

use App\Category;
use App\Option;
use App\Result;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questions extends Model
{
    use HasFactory;
    protected $table ='questions';
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'question',
        'category_id',
        'question_number',

    ];

    public function questionOptions()
    {
        return $this->hasMany(options::class, 'question_id', 'id');
    }

    public function questionsResults()
    {
        return $this->belongsToMany(results::class);
    }

    public function category()
    {
        return $this->belongsTo(question_category::class, 'category_id');
    }
}
