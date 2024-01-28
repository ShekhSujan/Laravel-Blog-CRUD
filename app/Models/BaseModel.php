<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $casts = [
        'meta' => 'json',
        'status' => StatusEnum::class,
    ];
    protected $hidden = [
        'image', 'created_at', 'updated_at', 'deleted_at'
    ];
    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        if (empty($this->image)) {
            return null;
        }
        return url('/') . '/' . $this->image;
    }
    public function scopeActive($query)
    {
        return $query->where('status', StatusEnum::Active->value);
    }
}
