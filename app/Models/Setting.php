<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory, SoftDeletes, HasUuids;
    protected $table = 'settings';
    protected $fillable = [
        'favicon',
        'logo',
        'white_logo',
        'phone',
        'address',
        'map',
        'site_email',

        'email',
        'cc',
        'bcc',
        'copyright',
        'copyright_url',
    ];
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at', 'favicon', 'logo', 'white_logo',
    ];
    protected $appends = ['logo_url', 'favicon_url', 'white_logo_url'];

    public function getAttributeUrl($attribute)
    {
        if (empty($this->$attribute)) {
            return null;
        }

        return url('/') . '/' . $this->$attribute;
    }

    public function getLogoUrlAttribute()
    {
        return $this->getAttributeUrl('logo');
    }

    public function getFaviconUrlAttribute()
    {
        return $this->getAttributeUrl('favicon');
    }

    public function getWhiteLogoUrlAttribute()
    {
        return $this->getAttributeUrl('white_logo');
    }
}
