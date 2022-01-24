
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu ficon"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                </a></li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center text-center ml-auto">
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex">
                        <span class="user-name font-weight-bolder rounded-pill px-2 justify-content-center text-center" style="background-color:#f4662f;color:white;line-height: 2.3;">
                            {{Auth::user()->name}}
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right d-flx flex-column py-1 px-0" aria-labelledby="dropdown-user">
                       
                        <div class="dropdown-items justify-content-center d-flex">
                            <form method="get" action="{{ route('signout') }}" class="my-2">
                                @csrf

                                <a class="mt-1" href="{{ route('signout') }}"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </div>
                </div>
                
            </li>
          
        </ul>
    </div>
</nav> 