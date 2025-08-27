<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'kegiatans';
    protected $fillable = ['nama','deskripsi','waktu','slug'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
