@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Liste des utilisateurs</h2></div>

                <div class="card-body">
               
                <div class="modal-content">
     
      <div class="modal-body text-center mb-1">
            <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Roles</th>
                        <th scope="col">email</th>
                        
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{implode(',',$user->roles()->get()->pluck('name')->toArray())}}</td>
                        <td>{{$user->email}}</td>
                        
                       
                        
                        <td>
                        @can('edit-users')
                            <a href="{{route('admin.users.edit',$user->id)}}" class="glyphicon glyphicon-edit   btn btn-primary">Edit</a>
                            @endcan
                            @can('delete-users')
                            <form action="{{route('admin.users.destroy',$user->id)}}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                                <button type="submit" onclick="return confirm('Voulez vs vraiment supprimer cette utilisateur ?')" class="glyphicon glyphicon-delite glyphicon-trash    btn btn-danger">Delete</button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            </div>
    </div>
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
