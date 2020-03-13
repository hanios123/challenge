@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('includes.errors')
            <div class="card">
                <div class="card-header">
                    <h5 class="float-left">Challenges</h5>
                    <input class="form-control float-left" style="width: 50%;margin-left: 3%" id="myInput" type="text" placeholder="Search..">

                    <div class="float-right">
                        @if(Auth::user()->auth=='organizer')
                        <button type="button" class="btn btn-sm btn-primary float-right"  data-toggle="modal" data-target="#add">New challenge</button>
                        @include('challenge.modal.add')
                        @endif
                        <button type="button" class="btn btn-sm btn-dark float-right"  data-toggle="modal" data-target="#filter">Filter</button>
                        @include('challenge.modal.filter')
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="bg-dark text-white">
                          <tr>
                            <th scop="col">Status</th>
                            <th scope="col">Organizer</th>
                            <th scope="col">Title</th>
                            <th scope="col" style="width: 50%" >Description</th>
                            <th scope="col">Dead Line</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody id="myTable">
                            @forelse ($challenges as $challenge)
                              <tr>
                                <td>@if($challenge->status == 'closed')
                                    <span class="badge badge-danger float-left">Closed</span>
                                  @else
                                    <span class="badge badge-success float-left">Open</span>
                                  @endif</td>
                                <td>{{$challenge->organizer->name}}</td>
                                <td>{{$challenge->title}}
                                </td>
                                <td style="word-break:break-all">{{$challenge->description}}</td>
                                <td>{{$challenge->deadline}}</td>
                                <td>
                                    <a href="{{route('challenge.view',$challenge->id)}}" class="btn btn-primary btn-sm">Details</a>
                                    @if(Auth::user()->auth=='organizer')
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit{{$challenge->id}}">Edit</button>
                                    @include('challenge.modal.edit')
                                    <form action="{{route('challenge.destroy',$challenge->id)}}"  method="POST">
                                        @csrf
                                       <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                    </form>
                                    @endif

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
@section('after_js')
<script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>
@endsection

