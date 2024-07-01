<nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
    <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
      if (navbarStyle && navbarStyle !== 'transparent') {
        document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
      }
    </script>
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">
            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip"
                data-bs-placement="left" aria-label="Toggle Navigation" data-bs-original-title="Toggle Navigation"><span
                    class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
        </div><a class="navbar-brand" href="index.html">
            <div class="d-flex align-items-center py-3"><img class="me-2"
                    src="{{ asset('adminassets/assets/img/icons/spot-illustrations/falcon.png') }}" alt=""
                    width="40"><span class="font-sans-serif">Admin</span></div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">

                    <a class="nav-link" href="{{ route('dashboard') }}">

                        <div class="d-flex align-items-center">

                            <span class="nav-link-text ps-1">Dashboard</span>
                        </div>

                    </a>

                    <ul class="nav collapse show" id="dashboard">

                        <li class="nav-item">

                            <a class="nav-link" href="">

                                <div class="d-flex align-items-center">

                                    <i class="fas fa-cog"></i>
                                    <span class="nav-link-text ps-1">Sitesetting

                                    </span>
                                </div>
                            </a><!-- more inner pages-->
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Management</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider">
                        </div>
                    </div>
                    <!-- parent pages-->
                </li>

                    @auth
                    {{-- @if (Auth::user()->isAdmin() || Auth::user()->isSuperAdmin()) --}}

                        {{-- <li class="nav-item">
                            <a class="nav-link dropdown-indicator" href="{{ route('admin.staff.index') }}" role="button" data-bs-toggle="collapse"
                                aria-expanded="false" aria-controls="email">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <i class="fas fa-users"></i>
                                    </span>
                                    <span class="nav-link-text ps-1">
                                        Staff
                                    </span>
                                </div>
                            </a>
                        </li> --}}

                        {{-- <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                            <div class="col-auto navbar-vertical-label">Lesson Plan</div>
                            <div class="col ps-0">
                                <hr class="mb-0 navbar-vertical-divider">
                            </div>
                        </div> --}}

                        <li class="nav-item">
                            <a href="{{ route('admin.staff.index') }}" class="nav-link dropdown-indicator">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <i class="fas fa-users"></i>
                                    </span>
                                    <span class="nav-link-text ps-1">
                                        Staff
                                    </span>
                                </div>
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a class="nav-link dropdown-indicator" href="{{ route('admin.users.index') }}" role="button" data-bs-toggle="collapse" --}}
                            {{-- <a class="nav-link dropdown-indicator" href="#email" role="button" data-bs-toggle="collapse" --}}
                                {{-- aria-expanded="false" aria-controls="email">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <i class="fas fa-user"></i>
                                    </span><span class="nav-link-text ps-1">User</span>
                                </div>
                            </a>
                        </li> --}}

                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link dropdown-indicator">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <span class="nav-link-text ps-1">
                                        User
                                    </span>
                                </div>
                            </a>
                        </li>

                        @can('view_users')
                    {{-- @can('hasPermission', 'view_users') --}}
                    <ul class="nav collapse" id="email">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.users.index') }}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Users</span>
                                </div>
                            </a>

                            <!-- more inner pages-->
                        </li>
                    @endcan

                    @can('view_roles')
                        {{-- @can('hasPermission', 'view_roles') --}}
                        <li class="nav-item">

                            <a class="nav-link" href="{{ route('admin.roles.index') }}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Roles</span>
                                </div>
                            </a>

                            <!-- more inner pages-->
                        </li>
                        @endcan

                        @can('view_permissions')
                        {{-- @can('hasPermission', 'view_permissions') --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.permissions.index') }}">
                                <div class="d-flex align-items-center"><span
                                        class="nav-link-text ps-1">Permission</span></div>
                            </a><!-- more inner pages-->
                        </li>
                        @endcan
                    </ul>
                    {{-- @endif --}}

                    <!-- parent pages-->

                <li class="nav-item">
                    <a class="nav-link dropdown-indicator" href="#customization" role="button" data-bs-toggle="collapse"
                        aria-expanded="false" aria-controls="customization">
                        <div class="d-flex align-items-center"><span class="nav-link-icon">
                                <i class="fas fa-wrench"></i>
                            </span><span class="nav-link-text ps-1"> {{ Auth::user()->name }}</span></div>
                    </a>
                    <ul class="nav collapse" id="customization">
                        {{-- <li class="nav-item"><a class="nav-link" href="{{ route('profile.index') }}"> --}}
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Profile</span>
                                </div>
                            </a><!-- more inner pages-->
                        {{-- </li> --}}

                    </ul><!-- parent pages-->
                    @endcan
        </div>
    </div>
</nav>
