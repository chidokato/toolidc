<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
<!-- <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"> -->
    
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup> </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="admin/main">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- <hr class="sidebar-divider"> -->
    <!-- <div class="sidebar-heading">Interface</div> -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('task.index')}}"><i class="fas fa-fw fa-chart-area"></i><span>Tác vụ</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#option"
            aria-expanded="true" aria-controls="option">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Dữ liệu</span>
        </a>
        <div id="option" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('channel.index')}}">Kênh chạy</a>
                <a class="collapse-item" href="{{route('project.index')}}">Dự án</a>
                <a class="collapse-item" href="{{route('supplier.index')}}">Nhà cung cấp</a>
                <a class="collapse-item" href="{{route('office.index')}}">Văn phòng</a>
                <a class="collapse-item" href="{{route('team.index')}}">Đội nhóm</a>
                <a class="collapse-item" href="{{route('classify.index')}}">Loại chi phí</a>
                <a class="collapse-item" href="{{route('setting.index')}}">Cầu hình</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('allocation.index')}}"><i class="fas fa-fw fa-chart-area"></i><span>Báo cáo</span></a>
    </li>
    
    <!-- <li class="nav-item">
        <a class="nav-link" href="admin/messages/list"><i class="fas fa-fw fa-chart-area"></i><span>Messages</span></a>
    </li> -->
    
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#giaydep"
            aria-expanded="true" aria-controls="giaydep">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Quản lý giày dép</span>
        </a>
        <div id="giaydep" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="admin/quanlykho/list">Tồn kho</a>
                <a class="collapse-item" href="admin/nhaphang/list">Nhập hàng</a>
                <a class="collapse-item" href="admin/banhang/list">Bán hàng</a>
                <a class="collapse-item" href="admin/giaydep/list">option</a>
            </div>
        </div>
    </li> -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#setting"
            aria-expanded="true" aria-controls="setting">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Cấu hình</span>
        </a>
        <div id="setting" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="admin/menu/list">Menu</a>
                <a class="collapse-item" href="admin/themes/list">Giao diện</a>
                <a class="collapse-item" href="admin/setting/list">Cài đặt</a>
                <a class="collapse-item" href="admin/seo/list">Seo</a>
            </div>
        </div>
    </li> -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}"><i class="fas fa-fw fa-chart-area"></i><span>Người dùng</span></a>
    </li>

    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>