@extends('layouts.app')


@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
        <div class="pull-right mt-1">
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Add</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success mt-1">
        <p>{{ $message }}</p>
    </div>
@endif


<table class="table table-bordered mt-1">
  <tr>
     <th>No</th>
     <th>Name</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <form action="{{ route('roles.destroy',$role->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>


{!! $roles->render() !!}

</div>
@endsection