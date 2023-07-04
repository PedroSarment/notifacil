<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [

        'title',
        'summary',
        'content',
        'views',
        'public',
        'created_by',
        'updated_by',
    ];

    public function Created_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function Updated_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
