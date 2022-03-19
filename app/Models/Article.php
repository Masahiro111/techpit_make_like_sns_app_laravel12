<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
    ];

    protected $withCount = [
        'likes',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->likes->where('id', $user->id)->count()
            : false;
    }

    public function isLiked(): bool
    {
        // if (auth()->user()) {
        //     return auth()->user()->likes()->forPost($this)->count();
        // }

        // if (($ip = request()->ip()) && ($userAgent = request()->userAgent())) {
        //     return $this->likes()->forIp($ip)->forUserAgent($userAgent)->count();
        // }

        return false;
    }

    public function removeLike(): bool
    {
        // if (auth()->user()) {
        //     return auth()->user()->likes()->forPost($this)->delete();
        // }

        // if (($ip = request()->ip()) && ($userAgent = request()->userAgent())) {
        //     return $this->likes()->forIp($ip)->forUserAgent($userAgent)->delete();
        // }

        return false;
    }
}
