<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','time','user_id'];

    /**
     *
     */
    protected $hidden = [
        'description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'time' => 'datetime:Y-m-d',
    ];


    /**
     * Meeting Owner
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     *  Participents
     */
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
