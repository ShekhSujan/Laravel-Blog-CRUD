<?php

namespace App\Models;

use App\Enums\StatusEnum;
use App\Models\Category;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes, HasUuids;
    protected $table = 'blogs';
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'image',
        'image_source',
        'category_id',
        'content_source',
        'tag',
        'view',
        'status',
        'created_by',
        'meta',
    ];

    protected $casts = [
        'image' => 'json',
        'meta' => 'json',
        'status' => StatusEnum::class,
    ];
    protected $hidden = [
        'image', 'created_at', 'updated_at', 'deleted_at'
    ];
    protected $appends = ['blog_url', 'image_url'];

    public function getImageUrlAttribute()
    {
        if (empty($this->image)) {
            return null;
        }
        return  [
            'thumnail' => url('/') . '/' . $this->image['thumnail'] ?? '',
            'cover' => url('/') . '/' . $this->image['cover'] ?? '',
        ];
    }
    public function scopeActive($query)
    {
        return $query->where('status', StatusEnum::Active->value);
    }
    public function getBlogUrlAttribute()
    {
        return route('blog_view', ['id' => $this->id, 'slug' => $this->slug]);
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->withDefault([
            'title' => '---',
        ]);
    }
    public function createdby()
    {
        return $this->belongsTo(User::class, 'created_by', 'id')->withDefault([
            'name' => '---',
        ]);
    }
    public function createddate()
    {
        return date('F j, Y', strtotime($this->created_at));
    }
    public function limit()
    {
        return Str::limit($this->short_description, 120);
    }
}
