<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}" class="logo">
            <img src="{{ $allSetting->logo_url }}" alt="" />
        </a>
    </div>
    <style>
        .aheader {
            padding: 0px 35px 0px 15px !important;
        }

        .bheader {
            padding: 5px 35px 5px 42px !important;
        }

        .page-wrapper .sidebar-wrapper .sidebar-menu .sidebar-dropdown>a:after {
            top: 10px !important;
        }

        .slimScrollBar {
            width: 10px !important;
            z-index: 99999 !important;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('li.sidebar-dropdown').each(function() {
                if ($(this).find('a.current-page').length > 0) {
                    $(this).addClass('active');
                }
            });
        });
    </script>
    <div class="sidebar-content">
        <div class="sidebar-menu NavScroll pb-5">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="icon-grid"></i>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
                @can('SuperAdmin')
                    <li class="sidebar-dropdown">
                        <a href="#" class="aheader">
                            <i class="icon-users"></i>
                            <span class="menu-text">Admins</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="{{ route('admin.create') }}"
                                        class="bheader {{ request()->url() == route('admin.create') ? 'current-page' : '' }}">New
                                        User</a></li>
                                <li><a href="{{ route('admin.index') }}"
                                        class="bheader {{ request()->url() == route('admin.index') ? 'current-page' : '' }}">All
                                        Admin</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan

                <li class="sidebar-dropdown">
                    <a href="#" class="aheader">
                        <i class="icon-file-text"></i>
                        <span class="menu-text">Blogs</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('blog.create') }}"
                                    class="bheader {{ request()->url() == route('blog.create') ? 'current-page' : '' }}">New
                                    Blog</a></li>
                            <li><a href="{{ route('blog.index') }}"
                                    class="bheader {{ request()->url() == route('blog.index') ? 'current-page' : '' }}">All
                                    Blog</a></li>
                            <li><a href="{{ route('blog.inactive') }}"
                                    class="bheader {{ request()->url() == route('blog.inactive') ? 'current-page' : '' }}">All
                                    Inactive Blog</a></li>
                            <li><a href="{{ route('category.create') }}"
                                    class="bheader {{ request()->url() == route('category.create') ? 'current-page' : '' }}">New
                                    Category</a></li>
                            <li><a href="{{ route('category.index') }}"
                                    class="bheader {{ request()->url() == route('category.index') ? 'current-page' : '' }}">All
                                    Category</a></li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-dropdown">
                    <a href="#" class="aheader">
                        <i class="icon-settings1"></i>
                        <span class="menu-text">Site Settings</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('setting') }}"
                                    class="bheader {{ request()->url() == route('setting') ? 'current-page' : '' }}">Setting</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="sidebar-dropdown">
                    <a href="#" class="aheader">
                        <i class="icon-refresh-cw"></i>
                        <span class="menu-text">Cache Refresh</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('clear_log') }}" class="bheader">Clear Log/Cache</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
