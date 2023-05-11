<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduans';

    protected $fillable = [
        'user_id',
        'modified_by',
        'pesan',
        'foto',
        'status',
        'rating'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function modified()
    {
        return $this->belongsTo(User::class, 'modified_by')->withDefault([
            'username' => '',
        ]);
    }
}
