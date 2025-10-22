<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Str;

class Renungan extends Model
{
    use HasFactory;

    protected $guarded = ['id']; 

    protected $casts = [
        'tanggal' => 'date', // Laravel akan otomatis ubah ke Carbon date
    ];  

     /**
     * Get the user that owns the Renungan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($renungan) {
            $renungan->slug = Str::random(6); // contoh: azssdx
        });
    }
}
