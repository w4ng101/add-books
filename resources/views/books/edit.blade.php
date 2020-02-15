@extends('layouts.app')
@section('content')
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-md-5">
                <h2 class="mb-5">Change author</h2>
                <form action="{{ route('books.update',$book->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="inputAddress">Title</label>
                        <input type="text" class="form-control" value="{{ $book->title }}" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Author</label>
                        <input type="text" name="author" value="{{ $book->author }}" class="form-control" placeholder="Name">
                    </div>
                    <button type="submit" class="btn btn-primary">Change</button>
                </form>
            </div>
        </div>
    </div>
@endsection