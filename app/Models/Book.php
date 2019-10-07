<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    /**
     * The model's attributes.
     *
     * @var array
     */
//    protected $attributes = [
//        'title'       => 'title',
//        'description' => 'description',
//        'user_id'      => 'userId',
//        'created_at'   => 'createdAt',
//        'updated_at'   => 'updatedAt'
//    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'user_id'];

    public function user(): BelongsTo
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
