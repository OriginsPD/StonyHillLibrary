<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Member
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BorrowedBook[] $borrowedBook
 * @property-read int|null $borrowed_book_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Member newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Member newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Member query()
 * @mixin \Eloquent
 */
class Member extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'username',
        'contact',
        'email'
    ];

    public function borrowedBook(): HasMany
    {
        return $this->hasMany(BorrowedBook::class, 'member_id');
    }
}
