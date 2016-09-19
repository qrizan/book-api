<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    /**
     * Create a new auth instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get all data from books
     */
    public function index(Request $request)
    {
      $books = Book::where('published', TRUE)->get();
      if (count($books) > 0) {
          return response()->json([
              'success' => TRUE,
              'result' => $books
          ]);
      }else{
          return response()->json([
              'success' => TRUE,
              'result' => 'No books have been published'
          ]);
      }
    }

    /**
     * Insert database for Book
     */
    public function create(Request $request)
    {
      $book = new Book;

      $book->fill([
        'title' => $request->input('title'),        
        'description' => $request->input('description'),
        'picture' => $request->input('picture'),
        'category_id' => $request->input('category_id'),        
        'user_id' => $request->input('user_id'),
        'published'=> TRUE
      ]);

      if($book->save()){
        return response()->json([
            'success' => TRUE,
            'result' => 'Success create new book'
        ]);
      }
    }

    /**
     * Get one data Book by id
     */
    public function read(Request $request, $id)
    {
      $book = Book::where('id',$id)->first();

      if ($book !== null) {
        return response()->json([
            'success' => TRUE,
            'result' => $book
        ]);        
      }else{
        return response()->json([
            'success' => FALSE,
            'result' => 'Book not found'
        ]);
      }
    }

    /**
     * Update data Book by id
     */
    public function update(Request $request, $id)
    {
      if ($request->has('title')) {
          $book = Book::find($id);
          $data = $request->only('title', 'description', 'picture', 'category_id', 'user_id','published');

          if ($book->update($data)) {
              return response()->json([
                  'success' => TRUE,
                  'result' => 'Success update '.$request->input('title')
              ]);
          }
      }else{
        return response()->json([
            'success' => FALSE,
            'result' => 'Please fill title book!'
        ]);        
      }
    }

    /**
     * Delete data ItemAds by id
     */
    public function delete(Request $request, $id)
    {
      $book = Book::find($id);
      if ($book->delete($id)) {
        return response()->json([
            'success' => TRUE,
            'result' => 'Success delete category'
        ]);    
      }
    }
}