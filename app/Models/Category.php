<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'img',
        'parent_id',
    ];

    public static function roots()
    {
        return self::where('parent_id', 0)->get();
    }

    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
