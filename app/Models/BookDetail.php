<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\BookDetail
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BorrowedBook[] $borrowedBook
 * @property-read int|null $borrowed_book_count
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\Subject $subject
 * @method static \Illuminate\Database\Eloquent\Builder|BookDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookDetail query()
 * @mixin \Eloquent
 */
class BookDetail extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
            'isbn',
            'title',
            'author',
            'genre_id',
            'page_no',
            'category_id',
            'description',
            'quantity',
            'encoded_by',
            'date_encoded'
    ];

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function borrowedBook(): HasMany
    {
        return $this->hasMany(BorrowedBook::class, 'book_id');
    }
}
