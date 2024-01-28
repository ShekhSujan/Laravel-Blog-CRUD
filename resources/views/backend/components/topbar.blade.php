<header class="header">
    <div class="toggle-btns">
        <a id="toggle-sidebar" href="#">
            <i class="icon-list"></i>
        </a>
        <a id="pin-sidebar" href="#">
            <i class="icon-list"></i>
        </a>
    </div>
    <div class="header-items">
        <ul class="header-actions">
            <li><a href="#" class="badge badge-info p-1" target="_blank"><i
                        class="icon-globe text-white"></i> &nbsp; | Front Page &nbsp;</a></li>
            <li class="dropdown">
            </li>
            <li class="dropdown">
                <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                    <span class="avatar">
                        @if (!Auth::user()->image)
                            <img src="{{ asset('assets/backend/images/pro.png') }}" alt="Profile">
                        @else
                            <img src="{{ Auth::user()->image_url }}" alt="Profile">
                        @endif
                        <span class="status online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
                    <div class="header-profile-actions">
                        <div class="text-center"><span
                                class="user-name badge badge-primary">{{ Auth::user()->name }}</span></div>
                        <hr>
                        <a class="dropdown-item" href="{{ route('profile.profile_update') }}"><i
                                class="mdi mdi-account-circle font-size-17 align-middle me-1"></i>Update
                            Profile</a>
                        <a class="dropdown-item d-block" href="{{ route('profile.change_password') }}"><i
                                class="mdi mdi-cog font-size-17 align-middle me-1"></i>Change Password</a>
                        <a href=""
                            onclick="event.preventDefault();
                        document.getElementById('logout').submit();"><i
                                class="icon-log-out1"></i> Logout</a>
                        <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
