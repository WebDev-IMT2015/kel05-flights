@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
      <div class="alert alert-success">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ session('success') }}
      </div>
    @elseif (session('failed'))
      <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ session('failed') }}
      </div>
    @elseif (session('update'))
      <div class="alert alert-success">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ session('update') }}
      </div>
    @elseif (session('delete'))
      <div class="alert alert-success">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ session('delete') }}
      </div>
    @endif
    <div class="row">
        @include('layouts.sidenav')
                        @yield('content')
             <!--/Display area after sidenav-->
             <div class="container-fluid">
        <div class="side-body">
           <h1> Main Content here </h1>
           <pre> Resize the screen to view the left slide menu </pre>
           <H1>THIS IS MAIN AREA</H1>         
        </div>
    </div>
    </div>
</div>


@endsection



