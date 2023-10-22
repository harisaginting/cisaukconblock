 <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
     <div class="sidebar-brand d-none d-md-flex">
         <img class="sidebar-brand-full" width="auto" height="46" alt="Gwyn Logo" src="{{ url('public') }}/admin/logo/clear/4.png" />
         <img class="sidebar-brand-narrow" width="auto" height="46" alt="Gwyn Logo" src="{{ url('public') }}/admin/logo/clear/2.png" />
     </div>
     <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
         <li class="nav-item"><a class="nav-link" href="{{ url('gwynadmin') }}">
                 <svg class="nav-icon ">
                     <use xlink:href="{{ url('public') }}/admin/vendors/@coreui/icons/svg/free.svg#cil-speedometer">
                     </use>
                 </svg> Dashboard <span class="badge badge-sm bg-warning ms-auto">DEV</span></a></li>
         {{-- <li class="nav-group"><a class="nav-link nav-group-toggle" href="{{ url('public') }}">
                 <svg class="nav-icon">
                     <use xlink:href="{{ url('public') }}/admin/vendors/@coreui/icons/svg/free.svg#cil-notes">
                     </use>
                 </svg> Pages <span class="badge badge-sm bg-warning ms-auto">DEV</span></a>
             <ul class="nav-group-items">
                 <li class="nav-item"><a class="nav-link" href="forms/form-control.html"> Contact Us</a></li>
                 <li class="nav-item"><a class="nav-link" href="forms/select.html"> About Us</a></li>
             </ul>
         </li> --}}
         <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                 <svg class="nav-icon">
                     <use xlink:href="{{ url('public') }}/admin/vendors/@coreui/icons/svg/free.svg#cil-star">
                     </use>
                 </svg> Contents <span class="badge badge-sm bg-warning ms-auto">DEV</span></a>
             <ul class="nav-group-items">
                 {{-- <li class="nav-item"><a class="nav-link" href="forms/form-control.html"> Banners</a></li> --}}
                 <li class="nav-item"><a class="nav-link" href="{{ url('gwynadmin') }}/article"> Article</a></li>
             </ul>
         </li>
         {{-- 
        <li class="nav-item"><a class="nav-link" href="colors.html">
                 <svg class="nav-icon">
                     <use xlink:href="{{ url('public') }}/admin/vendors/@coreui/icons/svg/free.svg#cil-life-ring">
                     </use>
                 </svg> Products <span class="badge badge-sm bg-warning ms-auto">DEV</span></a></li>
         <li class="nav-item"><a class="nav-link" href="typography.html">
                 <svg class="nav-icon">
                     <use xlink:href="{{ url('public') }}/admin/vendors/@coreui/icons/svg/free.svg#cil-people">
                     </use>
                 </svg> Members <span class="badge badge-sm bg-warning ms-auto">DEV</span></a></li>
         <li class="nav-item"><a class="nav-link" href="typography.html">
                 <svg class="nav-icon">
                     <use xlink:href="{{ url('public') }}/admin/vendors/@coreui/icons/svg/free.svg#cil-cart">
                     </use>
                 </svg> Orders <span class="badge badge-sm bg-warning ms-auto">DEV</span></a></li> 
        --}}
         <li class="nav-title">Administration</li>
         {{-- <li class="nav-item"><a class="nav-link" href="/admin/users">
                 <svg class="nav-icon">
                     <use xlink:href="{{ url('public') }}/admin/vendors/@coreui/icons/svg/free.svg#cil-people">
                     </use>
                 </svg> Users</a></li> --}}
         <li class="nav-item"><a class="nav-link" href="{{ url('/') }}/gwynadmin/setting">
                 <svg class="nav-icon">
                     <use xlink:href="{{ url('public') }}/admin/vendors/@coreui/icons/svg/free.svg#cil-settings">
                     </use>
                 </svg> Settings <span class="badge badge-sm bg-warning ms-auto">DEV</span></a>
         </li>
     </ul>
     <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
 </div>
