<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button"
            onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
                <use xlink:href="{{ url('public') }}/admin/vendors/@coreui/icons/svg/free.svg#cil-menu">
                </use>
            </svg>
        </button>
        <a class="header-brand d-md-none" href="#">
            <img width="auto" height="46" alt="Gwyn Logo" src="{{ url('public') }}/gwyn.png" />
        </a>

        <ul class="header-nav ms-3">
            <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#"
                    role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-md border border-2 border-primary"><img class="avatar-img"
                            src="{{ url('public') }}/gwynlogo/2.png" alt="user@email.com"></div>
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="dropdown-header bg-light py-2">
                        <div class="fw-semibold">Account</div>
                    </div>
                        <a class="dropdown-item" href="#">
                            <svg class="icon me-2">
                                <use xlink:href="{{ url('public') }}/admin/vendors/@coreui/icons/svg/free.svg#cil-user">
                                </use>
                             </svg> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-item" id="btn-logout">
                            <svg class="icon me-2">
                                <use
                                    xlink:href="{{ url('public') }}/admin/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
                                </use>
                            </svg> Logout
                        </div>
                </div>
            </li>
        </ul>
    </div>
</header>
