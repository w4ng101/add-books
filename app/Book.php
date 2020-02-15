<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'id',  'title', 'author'
    ];

    // get all book list and display to books view....
    public function get_books() {
        return self::all();
    }

    // save books....
    public function save_books($data) {
        return self::create($data);
    }

    // delete books....
    public function delete_books($id) {
        $book = self::find($id);
        return  $book->delete();
    }

    // update books....
    public function update_books($id, $data) 
    {
        return self::where('id',$id)->update(array('author' => $data));
    }
}
