@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </p>
                        
                    </div>
                @endif
            </div>
            <div class="col-md-5">
                <h2 class="mb-5">Add new book</h2>
                <form action="{{ route('books.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                          <input type="text" name="title" class="form-control" placeholder="Title" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Author</label>
                        <div class="col-sm-10">
                          <input type="text" name="author" class="form-control" placeholder="Author" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                    
                </form>
            </div>
            <br>
            <div class="col-md-12">
                <books></books>    
            </div>
        </div>
    </div>

@endsection