<header class="header-top" header-theme="light">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu d-flex align-items-center">
                <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                
                <div class="header-search">
                    <div class="input-group">

                        <span class="input-group-addon search-close">
                            <i class="ik ik-x"></i>
                        </span>
                        <input type="text" class="form-control">
                        <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                    </div>
                </div>
                <button class="nav-link" title="clear cache">
                    <a  href="{{url('clear-cache')}}">
                    <i class="ik ik-battery-charging"></i> 
                </a>
                </button> &nbsp;&nbsp;
                <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
            </div>
            <?php 
                if (\Auth::user()->role == 2) {
                    $humanResources = \App\HumanResource::where('review',0)->orderBy('id','DESC')->get();
                }
                if (\Auth::user()->role == 3){
                    $humanResources = \App\HumanResource::where('status','!=',0)->where('review_user',0)->where('user_id',\Auth::user()->id)->orderBy('id','DESC')->get();
                }
                
            ?>
            <div class="top-menu d-flex align-items-center">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="notiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-bell"></i><span class="badge bg-danger">{{ count($humanResources) == 0 ? '' : count($humanResources) }}</span></a>
                    <div class="dropdown-menu dropdown-menu-right notification-dropdown text-right" aria-labelledby="notiDropdown">
                        <h4 class="header">الاشعارات</h4>
                        <div class="notifications-wrap ">
                            @if (\Auth::user()->role == 2) 
                                @isset($humanResources)
                                    @foreach ($humanResources as $humanResource)
                                        <a href="{{ route('humanResources.edit',$humanResource->id) }}" class="media">
                                            <span class="media-body">
                                                <label class="heading-font-family media-heading">{{ $humanResource->user->name }}</label> 
                                                <label class="media-content">{{ $humanResource->reason}}</label>
                                            </span>
                                            <span class="d-flex">
                                                <i class="ik ik-check"></i> 
                                            </span>
                                        </a>  
                                    @endforeach
                                @endisset
                            @endif
                            @if (\Auth::user()->role == 3) 
                                @isset($humanResources)
                                    @foreach ($humanResources as $humanResource)
                                        <a href="{{ route('humanResources.edit',$humanResource->id) }}" class="media">
                                            <span class="media-body">
                                                <label class="heading-font-family media-heading">{{ $humanResource->user->name }}</label> 
                                                <label class="media-content">تم {{ $humanResource->status == 2 ? 'رفض' : 'قبول'}} طلبك</label>
                                                <label class="media-content">{{ $humanResource->reason}}</label>
                                            </span>
                                            <span class="d-flex">
                                                <i class="ik ik-check"></i> 
                                            </span>
                                        </a>  
                                    @endforeach
                                @endisset
                            @endif
                        </div>
                    </div>
                </div>
                <button type="button" class="nav-link ml-10 right-sidebar-toggle"><i class="ik ik-message-square"></i><span class="badge bg-success">3</span></button>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-plus"></i></a>
                    <div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Dashboard"><i class="ik ik-bar-chart-2"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Message"><i class="ik ik-mail"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Accounts"><i class="ik ik-users"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Sales"><i class="ik ik-shopping-cart"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Purchase"><i class="ik ik-briefcase"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Pages"><i class="ik ik-clipboard"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Chats"><i class="ik ik-message-square"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Contacts"><i class="ik ik-map-pin"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Blocks"><i class="ik ik-inbox"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Events"><i class="ik ik-calendar"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Notifications"><i class="ik ik-bell"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="More"><i class="ik ik-more-horizontal"></i></a>
                    </div>
                </div>
                <button type="button" class="nav-link ml-10" id="apps_modal_btn" data-toggle="modal" data-target="#appsModal"><i class="ik ik-grid"></i></button>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="{{ asset('img/user.jpg')}}" alt=""></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{route('profile.index')}}"><i class="ik ik-user dropdown-icon"></i> {{ __('Profile')}}</a>
                        <a class="dropdown-item" href="#"><i class="ik ik-navigation dropdown-icon"></i> {{ __('Message')}}</a>
                        <a class="dropdown-item" href="{{ url('logout') }}">
                            <i class="ik ik-power dropdown-icon"></i> 
                            {{ __('Logout')}}
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
