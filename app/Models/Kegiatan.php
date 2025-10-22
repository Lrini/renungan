<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\User;

class Kegiatan extends Model
{
    use HasFactory;
    protected $guarded = ['id']; 


    public function user()
    {
        return $this->belongsTo(User::class);
    }

     protected static function boot()
    {
        parent::boot();

        static::creating(function ($kegiatan) {
            $kegiatan->slug = Str::random(6); // contoh: azssdx
        });
    }
}
