<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->


        <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

            <li class="active">
                <a href="/api/v1/admin/dashboard">
                    <i class="fa fa-tachometer"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>


            <li >
                <a href="/api/v1/admin/appointments">
                    <i class="icon-calendar"></i>
                    <span class="title">All Appointments</span>

                </a>
            </li>

            <li >
                <a href="/api/v1/admin/myappointments">
                    <i class="icon-calendar"></i>
                    <span class="title">My Appointments</span>

                </a>
            </li>

            <li class="javascript:;">
                <a href="/api/v1/admin/users">
                    <i class="icon-user"></i>
                    <span class="title">Barbers</span>

                </a>
            </li>

        </ul>
    </div>
</div>