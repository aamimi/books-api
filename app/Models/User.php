<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:d-m-Y H:i:s',
        'updated_at' => 'datetime:d-m-Y H:i:s',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'full_name',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function ratings()
    {
        return $this->belongsToMany(Book::class, 'ratings')
            ->using(Rating::class)
            ->withPivot('rating')
            ->withTimestamps();
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }
}
