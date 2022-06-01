<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return $this->success($books);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $book = Book::create([
            'title' => $data['title'],
            'unitCount' => $data['unitCount'],
            'price' => $data['price'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $this->success($book);
    }

    public function show($id)
    {
        $book = Book::find($id);
        return $this->success($book);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->update($request->toArray());
        return $this->success($book);

    }

    public function destroy($id)
    {
        Book::destroy($id);
        return $this->success("Book deleted");
    }
}
