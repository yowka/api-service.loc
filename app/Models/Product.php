<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'category_id',
    ];
    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }
    public function photos():HasMany{
        return $this->hasMany(Photo::class);
    }
}
