@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Challenges </div>
                <div class="card-body">
                    <div class="float-right" style="margin-top: 4%;">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">add</button>
                        @include('challenge.modal.add')
                    </div>
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Organizer</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Dead Line</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($challenges as $challenge)
                              <tr>
                                <td>{{$challenge->user_id}}</td>
                                <td>{{$challenge->title}}</td>
                                <td>{{$challenge->description}}</td>
                                <td>{{$challenge->deadline}}</td>
                                <td>
                                    <a href="{{route('challenge.view',$challenge->id)}}" class="btn btn-primary">Details</a>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$challenge->id}}">Edit</button>
                                    <button type="button" class="btn btn-danger">Remove</button>
                                    @include('challenge.modal.edit')

                                </td>
                              </tr>
                            @empty
                              <tr>
                                <td colspan="4" >No Challenges yet</td>
                              </tr>
                            @endforelse
                        </tbody>
                      </table>
                      {{$challenges->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

