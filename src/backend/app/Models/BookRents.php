<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRents extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'book_rents';

    protected $fillable = [
        'book_id',
        'user_id',
        'status_id',
        'expiration_date',
    ];

    public static function countBookRents(Book $book)
    {
        return self::where('book_id', $book->id)
                    ->whereIn('status_id', [1, 3])
                    ->count();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function status()
    {
        return $this->belongsTo(BookRentStatus::class);
    }


}
