<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question_category extends Model
{
    use HasFactory;
    protected $table ='question_category';
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'category_name',
    ];
}
