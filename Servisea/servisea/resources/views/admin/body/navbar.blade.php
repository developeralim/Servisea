<nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.html"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    @if(!Session::get('employee'))
                    <li class="menu-title">Elements</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Elements</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-fire"></i><a href="{{route('view_admin_jr')}}">List of Job Requests</a></li>
                            <li><i class="fa fa-book"></i><a href="{{route('view_admin_gig')}}">List of Gigs</a></li>
                            <li><i class="fa fa-th"></i><a href="{{route('category.page')}}">Gig Category</a></li>
                            <li><i class="fa fa-file-word-o"></i><a  href="{{route('address.page')}}">Address</a></li>
                        </ul>
                    </li>
                   <li class="menu-title">USERS</li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Accounts</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="{{route('view_admin_user',Crypt::encryptString('PO'))}}">Project Owner</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="{{route('view_admin_user',Crypt::encryptString('Freelancer'))}}">Freelancer</a></li>
                        </ul>
                    </li>
                    <li class="menu-title">EMPLOYEE</li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Accounts</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="{{route('view_admin_user',Crypt::encryptString('Employee'))}}">Employee</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="{{route('view_admin_department')}}">Department</a></li>
                        </ul>
                    </li>
                    @else
                    <li class="menu-title">DISPUTE</li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Support</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="{{ route('viewEmpDispute') }}">List of all Disputes</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="{{ route('viewEmpDispute') }}">Support</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="">Refund</a></li>
                        </ul>
                    </li>
                    <li class="menu-title">PROFILE</li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" > <i class="menu-icon fa fa-glass"></i>My Profile</a>
                    </li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
