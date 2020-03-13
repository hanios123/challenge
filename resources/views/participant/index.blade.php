@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div id="main"  class="row justify-content-center">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
        <div class="col-md-12">
            @include('includes.errors')
            <div class="card">
                <div class="card-header">Users </div>
                <div class="card-body">
                    <table id="partTable" class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col" style="width: 2%">#Rank</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Code</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($participants as $participant)
                              <tr>
                                <td><input type="checkbox"></td>
                                <td>{{$participant->pivot->rank}}</td>
                                <td>{{$participant->name}}</td>
                                <td>{{$participant->email}}</td>
                                <td>{{$participant->pivot->title}}</td>
                                <td>{{$participant->pivot->description}}</td>
                                <td><button type="button" class="btn btn-dark btn-sm" onclick="onClickCodeView({{$participant->pivot->code}})" >View Code</button></td>
                                 @include('participant.modal.code')
                                <td>
                                    <button type="button" class="btn btn-success btn-sm"  onclick="openNav(mySidenav{{$participant->id}})">Decide Winner</button>

                                    @include('participant.modal.decide')
                                </td>
                              </tr>
                            @empty
                              <tr>
                                <td colspan="4" >No participants to display</td>
                              </tr>
                            @endforelse
                        </tbody>
                      </table>
                      {{$participants->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
