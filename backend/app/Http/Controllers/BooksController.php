<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    //
    function createbooks(Request $request){
        $request->validate([
            'book' => 'required|file|mimes:epub,pdf,doc,docx,mobi', // Validate books file type
            'title' => 'required|string',
            'grade' => 'required|string',
            'subject' => 'required|string'
        ]);
        $bookPath = $request->file('book')->store('book', 'public');


        $books = Books::create([
            'title' => $request->title,
            'bookpath' => $bookPath, // Store the file path in the database
            'grade'=>$request->grade,
            'subject'=>$request->subject
        ]);

        $booksCheck = Books::find($books->id);

        if($booksCheck){
            return response()->json($booksCheck);
        }
        else{
            return response("books creation unsuccessful",500);
        }
    }

    function readAllbooks(){
        $books = Books::all();
        
        if($books){
            return response()->json($books);
        }
        else{
            return response("No books found");
        }
    }

 
    
   
    function readbookgs(Request $request){//according to grade and subject hence the gs
        $request->validate([
            'grade' => 'required',
            'subject' => 'required'
        ]);

        $grade = $request->grade;
        $subject = $request->subject;

    // Query the books based on grade and subject
    $books = Books::where('grade', $grade)
                  ->where('subject', $subject)
                  ->get();

        
        if($books->isNotEmpty()){
            $bookData = $books->map(function ($book) {
                return [
                    'title' => $book->title,
                    'grade' => $book->grade,
                    'subject' => $book->subject,
                ];
            });
    
            return response()->json(['books' => $bookData]);
        } else {
            return response("No such books exist");
        }
    }

    function updatebooks(Request $request){
        $request->validate([
            'id' => 'required'
        ]);
    
        $books = Books::find($request->id);
    
        if($books){
            $books->title = $request->title; // Update the 'title' field, not 'name'
    
            $books->save();
            return response()->json($books);
        }
        else{
            return response("Update unsuccessful, no such book exists");
        }
    }

    function deletebooks(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $books = Books::find($request->id);

        if($books){
            $deletedbooks = $books;

            $books->delete();
            return response()->json($deletedbooks);
        }
        else{
            return response("Delete unsuccessful, no such books exits");
        }
    }
}
