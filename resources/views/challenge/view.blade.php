@php use Carbon\Carbon @endphp

@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-12 col-md-offset-2">
        <div class="card mb-4   border-dark" style="max-width: 100%;">
            <div class="card-header bg-dark ">
                <h5 class="text-white float-left">Challenge </h5>
                @if($challenge->status == 'closed')
                  <span class="badge badge-danger float-left">Closed</span>
                @else
                  <span class="badge badge-success float-left">Open</span>
                @endif
                <div class="form-group float-right">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$challenge->id}}">Edit</button>
                    @include('challenge.modal/edit')
                    <button type="button" class="btn btn-secondary btn-sm">Participate</button>
                </div>
            </div>
            <div class="row no-gutters">
              <div class="col-md-2">
                <img src="{{asset('challenge2.png')}}" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class=" card-title">Title : {{ $challenge->title }}</span>
                  </h5>
                  <p class="card-text">Description : {{$challenge->description }}.</p>
                </div>
                <div class="card-footer bg-transparent border-dark">
                    <p class="card-text float-left ">@if (Carbon::now()->gte($challenge->deadline) )
                        <small class=" badge badge-danger text">DeadLine :  {{ $challenge->deadline }}</small></p>
                        @else
                        <small class=" badge badge-success text">DeadLine :  {{ $challenge->deadline }}</small></p>
                    @endif

                    <p class="card-text float-right "><small class="text-muted">By {{ $challenge->organizer->name }} Updated : {{ $challenge->updated_at }}</p>

                </div>
              </div>
            </div>
          </div>

        <h3>Comments</h3>
        @if (Auth::check())
          @include('includes.errors')
          <form role="form" action="{{route('comments.store')}}" method="post">
            @csrf
            <div class="form-group">
              <textarea class="form-control" name="content" placeholder="Write a comment">{{ old('content') }}</textarea>
              <input type="hidden" name="challenge_id" value="{{$challenge->id}}">
            </div>
            <div class="form-group">
              <button type="submit" class="form-control btn btn-dark btn-sm"> Send </button>
            </div>
          </form>
        @endif
        @forelse ($challenge->comment_users as $comment)

        <div class="card border-dark mb-4" style="max-width: 100%;">
            <div class="row no-gutters">
              <div class="col-md-1" style="margin-top: 1%;margin-left: 1%">
                <img src="{{asset('organizer.png')}}" class="card-img" alt="...">
              </div>
              <div class="col-md-10">
                <div class="card-body">
                  <h5 class="card-title">{{$comment->name}}</h5>
                  <p class="card-text">{{$comment->pivot->content}}.</p>
                  <p class="card-text  float-right">Posted: <small class="text-muted">{{$comment->pivot->updated_at}}</small></p>

                </div>

                <div class="card-footer bg-transparent border-dark">
                    <div class="form-group float-right" >
                        @if (Auth::user()->id =$comment->id)
                           <button type="button" class="btn btn-primary btn-sm">Edit</button>
                           <button type="button" class="btn btn-danger btn-sm">Remove</button>
                        @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
        @empty
          <p>This post has no comments</p>
        @endforelse

    </div>
  </div>
</div>
@endsection
