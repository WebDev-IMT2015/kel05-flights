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
           <h1> Welcome {{ Auth::user()->name }} </h1>
           <pre> Current Date: {{ date('l , j F Y') }} </pre>  
        </div>
    </div>
    </div>
</div>


@endsection



