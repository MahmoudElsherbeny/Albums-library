<!-- Header -->
<header class="app-layout-header">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-9 col-sm-7 col-xs-9">
                    <span class="navbar-page-title">Albums Library</span>
                </div>

                <div class="col-md-3 col-sm-5 col-xs-3">
                    <ul class="nav navbar-nav navbar-toolbar">
                        <li class="hidden-xs">
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
                </div>

            </div>                
        </div>
        <!-- .container-fluid -->
    </nav>
</header>