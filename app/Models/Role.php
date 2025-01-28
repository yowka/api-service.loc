<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    // Указываем все поля из таблицы, кроме id, created_at и updated_at
    protected $fillable = [
        'name',
        'code',
    ];

    // Связь 1:M к модели User
    public function users(): HasMany {
        return $this->hasMany(User::class);
    }

}
