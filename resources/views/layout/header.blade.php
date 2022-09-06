<!-- Header -->
<header class="app-layout-header p-x-md">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <span class="navbar-page-title">Albums Library</span>
            </div>

            <div class="collapse navbar-collapse" id="header-navbar-collapse">
                <!-- .navbar-left -->
                <ul class="nav navbar-nav navbar-right navbar-toolbar hidden-sm hidden-xs">
                    <li>
                        <a href="javascript:void(0)" data-toggle="dropdown">
                            <span class="text-capitalize m-r-sm">@if(Auth::user()) {{ Auth::user()->name }} @endif</span>
                        </a>
                    </li>
                    <li>
                        {!! Form::open(['url' => route('logout')]) !!}
                            <button type="submit">Logout</button>
                        {!! Form::close() !!}
                    </li>
                </ul>
                <!-- .navbar-right -->
                
            </div>
        </div>
        <!-- .container-fluid -->
    </nav>
</header>