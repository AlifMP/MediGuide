<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Articles extends Model
{
    use HasFactory;

    protected $table = 'health_information';
    protected $guarded = [
        'id_info',
    ];

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_info');
    }
}
