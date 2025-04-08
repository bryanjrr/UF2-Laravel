<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = 'films';

    protected $fillable = [
        'name',
        'year',
        'genre',
        'country',
        'duration',
        'img_url'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }
}
