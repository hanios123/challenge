@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('includes.errors')
            <div class="card">
                <div class="card-header">
                    <h5 class="float-left">Challenges</h5>
                    <div class="float-right">
                        <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#add">New challenge</button>
                        @include('challenge.modal.add')
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="bg-dark text-white">
                          <tr>
                            <th scope="col">Organizer</th>
                            <th scope="col">Title</th>
                            <th scope="col" style="width: 50%" >Description</th>
                            <th scope="col">Dead Line</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($challenges as $challenge)
                              <tr>
                                <td>{{$challenge->organizer->name}}</td>
                                <td>{{$challenge->title}}</td>
                                <td style="word-break:break-all">{{$challenge->description}}</td>
                                <td>{{$challenge->deadline}}</td>
                                <td>
                                    <a href="{{route('challenge.view',$challenge->id)}}" class="btn btn-primary btn-sm">Details</a>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit{{$challenge->id}}">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm">Remove</button>
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

