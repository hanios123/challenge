@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div id="main"  class="row justify-content-center">
        <div class="col-md-12">
            @include('includes.errors')
                <textarea style="height: 100%" id="coder">{{$code}}</textarea>
            </div>
        </div>
    </div>
</div>
@endsection
@section('after_js')
<script>
        var myTextArea = document.getElementById('coder');
        CodeMirror.fromTextArea(myTextArea, {
            lineNumbers: true,
            mode:  "javascript"
        });


</script>
@endsection
