<?php

namespace App\Http\Controllers;

use XML;
use App\Book;
use App\Export;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('auth');
         $this->book = new Book();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookList = $this->book->get_books();
        return view('books.index',compact('bookList'))->with('no',1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'author'=> 'required'
        ]);
        $data = [
            'title'  => $request['title'],
            'author' => $request['author']
        ];
        $this->book->save_books($data);
        return redirect()->route('books.index')->with('success','New book created successfully');  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = $this->book->find($id);
        return view('books.edit',compact('book'))->with('pNo',1);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->book->delete_books($id);
        return redirect()->route('books.index')
                        ->with('success','Book deleted successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        request()->validate([
            'author' => 'required'
        ]);
        $this->book->update_books($book["id"], $request['author']);
        return redirect()->route('books.index')
                        ->with('success','Author updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $this->book->delete();
        return redirect()->route('books.index')
                        ->with('success','Book deleted successfully');
    }

     /**
     * Generate csv file into storage folder.
     *
     */
    public function export() 
    {
        $filename = "books".time().".csv";
        Excel::store(new Export,$filename);
        $path = storage_path($filename);
        return redirect()->back()->with('success','Csv was successfully generated into storage folder'); 
    }
    
    /**
     * Generate xml file into public folder.
     *
     *
    * @return \Illuminate\Support\Collection
    */
    public function exportxml() 
    {
        $books = $this->book->get_books();
        foreach ($books as $key => $value) {
           $result['books'] = [
                ['title' =>$value->title],
                ['author' =>$value->author]
            ];
        }
        XML::export($result)->toFile("./xmlfiles/books".time().".xml");
        return redirect()->back()->with('success','Xml was successfully generated into public folder'); 
    }
}
