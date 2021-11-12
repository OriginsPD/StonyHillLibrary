<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Category
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BookDetail[] $bookDetail
 * @property-read int|null $book_detail_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @mixin \Eloquent
 */
class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'type'
    ];

    public function bookDetail(): HasMany
    {
        return $this->hasMany(BookDetail::class, 'category_id');
    }
}
