<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookRents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookRentsController extends Controller
{
    public function new(Request $request)
    {
        try {
            $data = $request->all();

            $book = Book::find($data['book_id']);
            if (BookRents::countBookRents($book) >= $book->unitCount) {
                throw new \Exception("This book is not available at the moment");
            }

            $rent = BookRents::create([
                'book_id' => $book->id,
                'user_id' => Auth::user()->id,
                'status_id'  => 1,
                'expiration_date' => now()->add('days', 5),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $rent->payment_value = "R$ " . $book->price;

            return $this->success($rent);

        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 400);
        }
    }

    public function allOngoingRents()
    {
        try {
            $rents = BookRents::where('status_id', 1)->get();

            $response = [];
            $rents->each(function ($item, $key) use (&$response) {
                $response[] = [
                    'book' => $item->book->title,
                    'user' => $item->user->name,
                    'status' => $item->status->status,
                    'expiration_date' => $item->expiration_date,
                ];
            });

            return $this->success($response);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 400);
        }
    }

    public function delivery($rent_id)
    {
        try {
            $rent = BookRents::findOrFail($rent_id);
            if ($rent->status_id == 2) {
                throw new \Exception("This book has already been delivered");
            }

            $rent->update(['status_id'  => 2, 'updated_at' => now()]);

            return $this->success("This books has delivered with success");

        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 400);
        }
    }
}
