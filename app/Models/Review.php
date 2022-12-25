<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'item_id',
        'name',
        'score',
        'comment',
        'reply'
];

public function items()
{
    return $this->belongsTo('App\Models\Item');
}

public function users()
{
    return $this->belongsTo('App\Models\User');
}

}
