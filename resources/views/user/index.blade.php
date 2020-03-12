@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Users </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Auth</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                              <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->auth}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->updated_at}}</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$user->id}}">Edit</button>
                                    @include('user.modal.edit')
                                </td>
                              </tr>
                            @empty
                              <tr>
                                <td colspan="4" >No Users yet</td>
                              </tr>
                            @endforelse
                        </tbody>
                      </table>
                      {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

