@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('includes.errors')
            <div class="card">
                <div class="card-header">Code Sample </div>
                <div class="card-body">
                    <form action="" method="POST">
                    <div class="form-group">
                       <textarea id="code" name="code">

                       </textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-dark btn-sm"> submit your Code </button>
                     </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('after_js')
<script>
    var myTextArea = document.getElementById('code');
    {{--  CodeMirror(document.body, {
        lineNumbers: true,
        value: "function myScript(){return 100;}\n",
        mode:  "javascript"
      });  --}}
    CodeMirror.fromTextArea(myTextArea, {
        lineNumbers: true,
        value: "function myScript(){return 100;}\n",
        mode:  "javascript"
      });
</script>
@endsection
