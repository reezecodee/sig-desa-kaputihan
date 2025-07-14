<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class VillageProfile extends Model
{
    use HasUuids;

    protected $guarded = ['id'];
}
