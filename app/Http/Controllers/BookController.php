<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    //

    public function booklist(){
        $books = Book::all();
        return view('layouts.booklist')->with('books',$books);
    }

    public function editbook($id){
        $book = Book::where('book_id',$id)->get()->toArray()[0];
        return view('layouts.editbook')->with('book',$book);
    }

    public function addBook(){
        return view('addBook');
    }

    public function saveBook(Request $request){
        $data = $request->all();
        if(isset($data['img'])){
            $imgurl = $request->file('img')->store('public');
            $data['img'] = Storage::url($imgurl);
        }
        $maxbook_id = Book::max('book_id');
        $data['book_id'] = is_null($maxbook_id) ? 1 : $maxbook_id + 1;
        Book::create($data);
        return redirect('booklist');
    }

    public function updatebook(Request $request){
        $data = $request->all();
        if(isset($data['img'])){
            $imgurl = $request->file('img')->store('public');
            $data['img'] = Storage::url($imgurl);
        }
        $book = Book::where('book_id',$request->book_id)->first();
        $book->update($data);
        return redirect('booklist');
    }

    public function deletebook($id){
        $book = Book::where('book_id',$id)->first();
        $book->delete();
        return redirect('booklist');
    }
}
