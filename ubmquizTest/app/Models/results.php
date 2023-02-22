<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class results extends Model
{
    use HasFactory;
    protected $table ='results';
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'user_id',
        'result_pdf',


    ];



    public function users()
    {
        return $this->belongsTo(user::class, 'user_id');
    }
}
