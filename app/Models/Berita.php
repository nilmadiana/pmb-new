<?php

namespace App\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Status;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'editor',
        'judul',
        'isi_berita',
        'gambar',
        'keterangan_gambar',
        'tanggal',
        'status',
        'tag',
        'comments',
        'user_id',
    ];

    public function getStatusDescriptionAttribute()
    {
        return Status::getDescription($this->status);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
