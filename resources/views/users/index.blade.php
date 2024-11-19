@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('List Users') }}</div>

                    <div class="card-body">                                                
                        <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>LastName</th>
                                <th>Telephone</th>
                                <th>Email</th>
                                <th>Admin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->lastname }}</td>
                                    <td>{{ $user->telephone }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if (Auth::id()!=$user->id)
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>  

                                        <form action="{{ route('users.update', $user->id) }}" method="POST" style="display: inline">
                                            @csrf
                                            @method('PUT')
                                            @if ($user->state==2)
                                                <input type="hidden" name="state" id="state" value="1">
                                                <button type="submit" class="btn btn-success">high</button>
                                            @else
                                                <input type="hidden" name="state" id="state" value="2">
                                                <button type="submit" class="btn btn-danger">low</button>
                                            @endif 

                                        </form>
                                        @else

                                        @endif
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
@endsection
