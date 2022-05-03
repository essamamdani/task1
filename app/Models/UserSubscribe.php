<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscribe extends Model
{
    use HasFactory;
    protected $with = ["websites"];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'website_id',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function websites()
    {
        return $this->belongsTo(Website::class, "website_id");
    }

    public function scopeGetFilterUser($q, $id)
    {
        return $q->when('websites', function ($q) use ($id) {
            return $q->where('id', $id);
        })->without(['websites'])->with(['user'])->get();
    }
}
