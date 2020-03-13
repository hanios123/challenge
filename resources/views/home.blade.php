@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="row row-cols-1 row-cols-md-1" style="padding-left: 10%;padding-right: 10%">
                @forelse ($challenges as $challenge)
                @include('challenge.includes/challenge_view')
                @empty
                    No challenges yet added
                @endforelse


            </div>

        </div>
    </div>
</div>
@endsection


