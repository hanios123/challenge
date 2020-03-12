@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <h3>{{ $challenge->title }}</h3>
        <div>
          {!! $challenge->content !!}
          <p>By {{ $challenge->organizer->name }}</p>
        </div>
        <h3>Comments</h3>
        @if (Auth::check())
          {{-- @include('includes.errors') --}}
          <form action="{{route('challenge.create')}}" method="post">
            @csrf
            <div class="form-group">
              <textarea class="form-control" name="content">{{ old('content') }}</textarea>
              <input type="hidden" name="challenge_id" value="{{$challenge->id}}">
            </div>
            <div class="form-group">
              <button type="submit" class="form-control btn btn-primary btn-sm"> Send </button>
            </div>
          </form>
        @endif
        @forelse ($challenge->comment_users as $comment)

        <div class="card border-dark mb-3" style="max-width: 100%;">
            <div class="row no-gutters">
              <div class="col-md-2" style="margin-top: 1%;margin-left: 1%">
                <img src="{{asset('organizer.png')}}" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{ $comment->name}}</h5>
                  <p class="card-text">{{$comment->pivot->content}}.</p>
                </div>
                <div class="card-footer bg-transparent border-dark">
                    <p class="card-text"><small class="text-muted">{{$comment->updated_at}}</small></p>
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
