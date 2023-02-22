<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class options extends Model
{
    use HasFactory;
    protected $table ='options';
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'option',
        'weight',
        'question_id',

    ];

    public function questionsResults()
    {
        return $this->belongsToMany(results::class);
    }

    public function question()
    {
        return $this->belongsTo(questions::class, 'question_id');
    }
}
