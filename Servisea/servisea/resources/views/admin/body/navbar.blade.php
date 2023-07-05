<nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.html"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Elements</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Elements</a>
                        <ul class="sub-menu children dropdown-menu">
                            <!-- <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Employee</a></li>
                            <li><i class="fa fa-bars"></i><a href="ui-tabs.html"></a></li>
                            <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                            <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li> -->
                            <li><i class="fa fa-fire"></i><a href="{{route('view_admin_jr')}}">List of Job Requests</a></li>
                            <li><i class="fa fa-book"></i><a href="{{route('view_admin_gig')}}">List of Gigs</a></li>
                            <li><i class="fa fa-th"></i><a href="{{route('category.page')}}">Gig Category</a></li>
                            <li><i class="fa fa-file-word-o"></i><a  href="{{route('address.page')}}">Address</a></li>
                        </ul>
                    </li>

                    <!-- <li class="menu-title">Support</li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>User</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Project Owner</a></li>
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Freelancer</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Employee</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="widgets.html"> <i class="menu-icon ti-email"></i>Refund</a>
                    </li> -->

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

                    <!-- <li class="menu-title">ADMINISTRATOR</li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Accounts</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="">Administrator</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="widgets.html"> <i class="menu-icon fa fa-id-card-o"></i>Profile</a>
                    </li> -->
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
