<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('admin.dashboard.index') }}">管理後台</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 管理員 <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li>
                <li>
                    <a href="{{ url('/logout') }}"
                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        <i class="fa fa-fw fa-gear"></i>
                        Logout
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-fw fa-dashboard"></i> 主控台</a>
            </li>
            <li>
                <a href="{{ route('admin.posts.index') }}"><i class="fa fa-fw fa-edit"></i> 文章管理</a>
            </li>
            <li>
                <a href="{{ route('admin.assets.index') }}"><i class="fa fa-fw fa-edit"></i> 資產管理</a>
            </li>
            <li>
                <a href="{{ route('admin.vendors.index') }}"><i class="fa fa-fw fa-edit"></i> 廠商管理</a>
            </li>
            <li>
                <a href="{{ route('admin.supplies.index') }}"><i class="fa fa-fw fa-edit"></i> 耗材管理</a>
            </li>
            <li>
                <a href="{{ route('admin.maintainces.index') }}"><i class="fa fa-fw fa-edit"></i> 報修管理</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
