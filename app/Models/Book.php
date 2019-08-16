<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:d-m-Y H:i:s',
        'updated_at' => 'datetime:d-m-Y H:i:s',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ratings()
    {
        return $this->belongsToMany(User::class, 'ratings')
            ->using(Rating::class)
            ->withPivot('rating')
            ->withTimestamps();
    }

    /**
     * @return float
     */
    public function getRatingAttribute(): float
    {
        $sum   = $this->ratings()->sum('rating');
        $count = $this->ratings()->count();

        return $count === 0 ? 0 : round($sum / $count);
    }
}
