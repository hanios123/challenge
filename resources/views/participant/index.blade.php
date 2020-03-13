@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div id="main"  class="row justify-content-center">
        <div class="col-md-12">
            @include('includes.errors')
            <div class="card">
                <div class="card-header">Participants </div>
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
                                <td>{{$participant->pivot->rank}} @if($participant->pivot->isWinner)<span class="badge badge-primary">Winner</span>@endif</td>
                                <td>{{$participant->name}}</td>
                                <td>{{$participant->email}}</td>
                                <td>{{$participant->pivot->title}}</td>
                                <td>{{$participant->pivot->description}}</td>
                                <td>
                                 @if(($participant->pivot->isWinner && Auth::user()->auth == 'participant') || ( Auth::user()->auth != 'participant'))
                                 <a href="{{route('participant.code',$participant->pivot->id)}}" class="btn btn-dark btn-sm"  >View Code</a></td>
                                 @endif
                                <td>
                                    @if(!$participant->pivot->isWinner && Auth::user()->auth != 'participant')
                                       <button type="button" class="btn btn-success btn-sm"  data-toggle="modal" data-target="#decide{{$participant->id}}">Decide Winner</button>
                                       @include('participant.modal.decide')
                                    @endif
                                </td>
                              </tr>
                            @empty
                              <tr>
                                <td colspan="4" >No participants to display</td>
                              </tr>
                            @endforelse
                        </tbody>
                      </table>
                      @if($participants->count()>0)
                      {{$participants->links()}}
                      @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('after_js')
<script>
    function createCodeEditor(editor){
        //var myTextArea = document.getElementById('code');
        CodeMirror.fromTextArea(editor, {
            lineNumbers: true,
            mode:  "javascript"
        });
    }

</script>
@endsection
