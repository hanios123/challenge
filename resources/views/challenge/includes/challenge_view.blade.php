@php use Carbon\Carbon @endphp
<div class="card mb-4   border-dark" style="max-width: 100%;">
    <div class="card-header bg-dark ">
        <h5 class="text-white float-left">Challenge </h5>
        @if($challenge->status == 'closed')
          <span class="badge badge-danger float-left">Closed</span>
        @else
          <span class="badge badge-success float-left">Open</span>
        @endif
        <div class="form-group float-right">
            @if($challenge->organizer->id == Auth::user()->id)
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$challenge->id}}">Edit</button>
            @include('challenge.modal/edit')
            @endif
            @if( \Request::route()->getName() != 'challenge.participate')
                @if($challenge->users()->find(Auth::user()->id)!==null || Carbon::now()->gte($challenge->deadline) )
                  <button  disabled class="btn btn-secondary btn-sm">Participate</button>
                @elseif($challenge->organizer->id != Auth::user()->id || Auth::user()->auth == 'admin' || Auth::user()->auth == 'participant')
                  <a href="{{route('challenge.participate',$challenge->id)}}" class="btn btn-secondary btn-sm">Participate</a>
                @endif
            @endif
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
