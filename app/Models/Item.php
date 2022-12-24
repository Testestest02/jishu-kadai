<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'status',
        'type',
        'sex',
        'max',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    public function points()
    {
        return $this->belongsToMany('App\Models\Point');
    }

    public function sizes()
    {
        return $this->belongsToMany('App\Models\Size');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

}
