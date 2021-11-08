<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orwhere('body', 'like', '%' . request('search') . '%')
                ->orwhere('excerpt', 'like', '%' . request('search') . '%');


            if ($filters['category'] ?? false) {
                $query
                    ->where('title', 'like', '%' . request('search') . '%')
                    ->orwhere('body', 'like', '%' . request('search') . '%')
                    ->orwhere('excerpt', 'like', '%' . request('search') . '%');

            }
        }
    }

    protected $with = ['category', 'user'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {

        return $this->belongsTo(User::class);
    }
}


