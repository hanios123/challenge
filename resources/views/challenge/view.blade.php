@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-12 col-md-offset-2">
        @include('challenge.includes/challenge_view')
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
        @forelse ($challenge->comment_users()->orderBy('updated_at', 'DESC')->get() as $comment)

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

                <div class="card-footer bg-transparent border-dark" style="margin-bottom: 2%">
                        @if (Auth::user()->id =$comment->id)
                        <form action="{{route('comment.delete',$comment->pivot->id)}}"method="POST">
                            @csrf
                           <button type="submit" class="btn btn-danger btn-sm float-right">Remove</button>
                        </form>
                           <button type="button" class="btn btn-primary btn-sm float-right" style="margin-right: 1%" data-toggle="modal" data-target="#editComment{{$challenge->id}}">Edit</button>
                           @include('challenge.modal.comment_edit')
                        @endif
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
