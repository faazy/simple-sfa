<nav class="header-navbar navbar navbar-with-menu navbar-static-top navbar-dark navbar-shadow ">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu hidden-md-up float-xs-left">
                    <a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs">
                        <i class="ft-menu font-large-1"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{config('app.url')}}" style="position: absolute" class="navbar-brand">
                        <h3 class="brand-text">{{config('app.name')}}</h3>
                    </a>
                </li>
                <li class="nav-item hidden-md-up float-xs-right">
                    <a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container">
                        <i class="fa fa-ellipsis-v"></i>
                    </a>
                </li>

            </ul>
        </div>
        <div class="navbar-container content container-fluid">
            <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
                <ul class="nav navbar-nav">
                    <li class="nav-item hidden-sm-down">
                        <a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs">
                            <i class="ft-menu"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-xs-right">
                    <li class="dropdown nav-item">
                        <a href="#" data-toggle="modal" data-target="#myModal"
                           data-placement="bottom" data-html="true"
                           title="<span>Today's Profit</span>"
                           class="nav-link nav-link-label">
                            <i class="ficon icon-calculator"></i>
                        </a>
                    </li>

                    <li class="dropdown dropdown-notification nav-item">
                        <a href="#" data-toggle="dropdown" class="nav-link nav-link-label">
                            <i class="ficon ft-alert-triangle"></i>
                            <span class="tag tag-pill tag-default tag-danger tag-default tag-up tag-glow"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0">
                                    <span class="grey darken-2">System Alert</span>
                                    <span class="notification-tag tag tag-default tag-warning float-xs-right m-0">
                                        New
                                    </span>
                                </h6>
                            </li>
                            <li class="list-group scrollable-container">
                                <a href="#" class="list-group-item">
                                    <div class="media">
                                        <div class="media-left valign-middle"><i
                                                    class="ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading yellow darken-3">Quantity Alerts
                                                <span class="tag tag-pill tag-danger pull-right"></span>
                                            </h6>
                                            <p class="notification-text font-small-2 text-muted">
                                                Product Quantity Re-order Level Reached</p>
                                        </div>
                                    </div>

                                </a>
                            </li>


                        </ul>
                    </li>

                    <li class="dropdown dropdown-user nav-item">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link">
                <span class="avatar avatar-online">
                    <img alt="user-avatar"
                         src=""><i></i></span>
                            <span class="user-name">Welcome {{auth()->user()->name}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#"
                               class="dropdown-item"><i class="ft-user"></i> Edit Profile</a>
                            <a href="#"
                               class="dropdown-item"><i class="icon-key"></i> Change Password</a>
                            <div class="dropdown-divider"></div>

                            <a href="{{ url('logout') }}" class="dropdown-item"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="ft-power"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>