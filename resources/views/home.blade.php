@extends('layouts.app')

@section('content')
<div class="container">
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



