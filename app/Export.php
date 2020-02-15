<?php

namespace App;

use App\Book;
use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Database\Eloquent\Model;

class Export implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Book::all();
    }
}
