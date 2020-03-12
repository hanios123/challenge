@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col mb-4">
                    <div class="card mb-3  border-dark" style="max-width: 540px;">
                        <div class="row no-gutters">
                          <div class="col-md-4">
                            <img src="{{asset('challenge2.png')}}" class="card-img" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class=" card-title">Card title <span class="badge badge-success">Success</span>
                              </h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                              {{-- <ul class="navbar-nav">
                                <li><span><i class="fa fa-calendar"></i> 2 days, 8 hours </span></li>
                              <li>|</li>
                              <span><i class="fa fa-comments"></i> 2 comments</span>
                              <li>|</li>
                              <li>
                                 <span class="fa fa-star"></span>
                                          <span class="fa fa-star"></span>
                                          <span class="fa fa-star-half-empty"></span>
                                          <span class="fa fa-star-o"></span>
                              </li>
                              <li>|</li>
                              <li>
                                <span><i class="fa fa-facebook-square"></i></span>
                                <span><i class="fa fa-twitter-square"></i></span>
                                <span><i class="fa fa-google-plus-square"></i></span>
                              </li>
                              </ul> --}}
                            </div>
                            <div class="card-footer bg-transparent border-dark">
                                <button type="button" class="btn btn-primary btn-sm">Small button</button>
                                <button type="button" class="btn btn-secondary btn-sm">Small button</button>
                            </div>
                          </div>
                        </div>
                      </div>

                </div>

                <div class="col mb-4">
                    <div class="card mb-3  border-dark" style="max-width: 540px;">
                        <div class="row no-gutters">
                          <div class="col-md-4">
                            <img src="{{asset('challenge2.png')}}" class="card-img" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class=" card-title">Card title <span class="badge badge-success">Success</span>
                              </h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                            <div class="card-footer bg-transparent border-dark">
                                <button type="button" class="btn btn-primary btn-sm">Small button</button>
                                <button type="button" class="btn btn-secondary btn-sm">Small button</button>
                            </div>
                          </div>
                        </div>
                      </div>

                </div>

                <div class="col mb-4">
                    <div class="card mb-3  border-dark" style="max-width: 540px;">
                        <div class="row no-gutters">
                          <div class="col-md-4">
                            <img src="{{asset('challenge2.png')}}" class="card-img" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class=" card-title">Card title <span class="badge badge-success">Success</span>
                              </h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                            <div class="card-footer bg-transparent border-dark">
                                <button type="button" class="btn btn-primary btn-sm">Small button</button>
                                <button type="button" class="btn btn-secondary btn-sm">Small button</button>
                            </div>
                          </div>
                        </div>
                      </div>

                </div>

                <div class="col mb-4">
                    <div class="card mb-3  border-dark" style="max-width: 540px;">
                        <div class="row no-gutters">
                          <div class="col-md-4">
                            <img src="{{asset('challenge2.png')}}" class="card-img" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class=" card-title">Card title <span class="badge badge-success">Success</span>
                              </h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                            <div class="card-footer bg-transparent border-dark">
                                <button type="button" class="btn btn-primary btn-sm">Small button</button>
                                <button type="button" class="btn btn-secondary btn-sm">Small button</button>
                            </div>
                          </div>
                        </div>
                      </div>

                </div>

                <div class="col mb-4">
                    <div class="card mb-3  border-dark" style="max-width: 540px;">
                        <div class="row no-gutters">
                          <div class="col-md-4">
                            <img src="{{asset('challenge2.png')}}" class="card-img" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class=" card-title">Card title <span class="badge badge-success">Success</span>
                              </h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                            <div class="card-footer bg-transparent border-dark">
                                <button type="button" class="btn btn-primary btn-sm">Small button</button>
                                <button type="button" class="btn btn-secondary btn-sm">Small button</button>
                            </div>
                          </div>
                        </div>
                      </div>

                </div>
            </div>

        </div>
    </div>
    <a href="#" class="float">
        <i class="fa fa-plus my-float"></i>
        </a>
</div>
@endsection
@section('after_js')
<script>
    var myTextArea = document.getElementById('myTextArea');
    CodeMirror(document.body, {
        lineNumbers: true,
        value: "function myScript(){return 100;}\n",
        mode:  "javascript"
      });
    {{-- CodeMirror.fromTextArea(myTextArea, {
        lineNumbers: true,
        value: "function myScript(){return 100;}\n",
        mode:  "javascript"
      }); --}}
</script>
@endsection

