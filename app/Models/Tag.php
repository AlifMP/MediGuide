<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tag_info';
    protected $guarded = [
        'id',
    ];
    public function articles()
    {
        return $this->hasMany(Articles::class, 'tag_info');
    }
}
