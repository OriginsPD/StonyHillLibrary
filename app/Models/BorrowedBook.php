<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\BorrowedBook
 *
 * @property-read \App\Models\BookDetail $bookDetail
 * @property-read \App\Models\Member $member
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|BorrowedBook newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BorrowedBook newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BorrowedBook query()
 * @mixin \Eloquent
 */
class BorrowedBook extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'book_id',
        'borrower_id',
        'date_borrowed',
        'due_date',
        'num_copies',
        'status',
        'over_due',
        'process_by',
        'date_return',
        'received_by',
    ];

    public function bookDetail(): BelongsTo
    {
        return $this->belongsTo(BookDetail::class, 'book_id');
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'borrower_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'received_by');
    }
}
