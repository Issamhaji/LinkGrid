<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public function scopeFilter($query , array $filters){
        if($filters['tag'] ?? false){
            $query->where('tags', 'LIKE', '%'. request('tag'). '%');
        }
        if($filters['search'] ?? false){
            $query->where('title', 'LIKE', '%'. request('search'). '%')
                  ->orWhere('tags', 'LIKE', '%'. request('search'). '%');
        }
    }
}
