<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasUuids;

    protected $guarded = ['id'];

    public function buildings(): HasMany
    {
        return $this->hasMany(Building::class, 'kategori_id');
    }
}
