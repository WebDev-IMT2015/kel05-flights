<div class="row">
    <!-- uncomment code for absolute positioning tweek see top comment in css -->
    <!-- <div class="absolute-wrapper"> </div> -->
    <!-- Menu -->
    <div class="side-menu">
    
    <nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <div class="brand-wrapper">

            <!-- Brand -->
            <div class="brand-name-wrapper">
                @if(Auth::user()->hasRole('admin'))
                    <a class="navbar-brand" href="#">
                        Admin
                    </a>
                @else
                    <a class="navbar-brand" href="#">
                        Customer Service
                    </a>
                @endif
            </div>

            
        </div>

    </div>


    <!-- Main Menu -->
    <div class="side-menu-container">
        <ul class="nav navbar-nav">
            
            @role('admin')
                <!-- Dropdown User-->
                <li class="panel panel-default" id="dropdown">
                    <a data-toggle="collapse" href="#dropdown-lvl1">
                        <span class="glyphicon glyphicon-user"></span> User <span class="caret"></span>
                    </a>

                    <!-- Dropdown level 1 -->
                    <div id="dropdown-lvl1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul class="nav navbar-nav">
                                <li><a href="{{ url('register') }}">Create New User</a></li>
                                <li><a href="{{ url('list') }}">Edit/Delete User</a></li>
                            </ul>
                        </div>
                    </div>
                </li>

                <!-- Dropdown Flight-->
                <li class="panel panel-default" id="dropdown">
                    <a data-toggle="collapse" href="#dropdown-lvl2">
                        <span class="glyphicon glyphicon-plane"></span> Flight <span class="caret"></span>
                    </a>

                    <!-- Dropdown level 1 -->
                    <div id="dropdown-lvl2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul class="nav navbar-nav">
                                <li><a href="{{ url('flight') }}">Create New Flight</a></li>
                                <li><a href="{{ url('flight/list') }}">Edit/Delete Flight</a></li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li>
                    <a href="{{ url('salesreport') }}"><span class="glyphicon glyphicon-file"></span> Sales Report </a>
                </li>
            @endrole

            @role('costumer-service')
                <li>
                    <a href="{{ url('ticket') }}"><span class="glyphicon glyphicon-file"></span> Create New Ticket </a>
                </li>
                
                <li>
                    <a href="{{ url('ticket/list') }}"><span class="glyphicon glyphicon-print"></span> Print/Delete Ticket </a>
                </li>
            @endrole
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
    
    </div>

    <!-- Main Content -->
    
</div>