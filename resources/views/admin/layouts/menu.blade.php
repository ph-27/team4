<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">PTY Shoes</li>
            <li class="active treeview menu-open">
                <a href="">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{route('users.danhsach')}}">
                <i class="fa fa-book"></i> <span>Thành viên</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('users.danhsach')}}"><i class="fa fa-circle-o text-red"></i></i> Danh sách</a></li>
                    <li><a href="{{route('users.them')}}"><i class="fa fa-circle-o text-yellow"></i> Thêm thành viên</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="{{route('category.danhsach')}}">
                <i class="fa fa-edit"></i> <span>Danh mục</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('category.danhsach')}}"><i class="fa fa-circle-o text-red"></i> Danh sách</a></li>
                    <li><a href="{{route('category.them')}}"><i class="fa fa-circle-o text-yellow"></i> Thêm danh mục</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="">
                <i class="fa fa-edit"></i> <span>Sản phẩm</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('products.danhsach')}}"><i class="fa fa-circle-o text-red"></i> Danh sách</a></li>
                    <li><a href="{{route('products.them')}}"><i class="fa fa-circle-o text-yellow"></i> Thêm sản phẩm</a></li>
                </ul>
            </li>
            <li>
                <a href="{{asset('/shoes/admin/bills')}}">
                <i class="fa fa-folder"></i> <span>Đơn hàng</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{route('news.danhsach')}}">
                    <i class="fa fa-book"></i> <span>Tin tức</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('news.danhsach')}}"><i class="fa fa-circle-o text-red"></i></i> Danh sách</a></li>
                    <li><a href="{{route('news.them')}}"><i class="fa fa-circle-o text-yellow"></i> Thêm tin tức</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-edit"></i> <span>Khuyến mãi</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{asset('/shoes/admin/sales')}}"><i class="fa fa-circle-o text-red"></i> Danh sách khuyến mãi</a></li>
                    <li><a href="{{asset('/shoes/admin/sales/create')}}"><i class="fa fa-circle-o text-yellow"></i> Thêm sản phẩm khuyến mãi</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="{{route('statistics.index')}}">
                <i class="fa fa-table"></i> <span>Báo cáo thống kê</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    {{--<li><a href="{{route('statistics.index')}}"><i class="fa fa-circle-o text-red"></i> Thống kê sản phẩm</a></li>--}}
                    <li><a href="{{route('statistics.index')}}"><i class="fa fa-circle-o text-yellow"></i> Thống kê đơn hàng</a></li>
                </ul>
            </li>
             {{--<li>--}}
                {{--<a href="{{asset('/shoes/admin/home/login')}}">--}}
                {{--<i class="fa fa-share"></i> <span>Đăng xuất</span>--}}
                {{--</a>--}}
            {{--</li>--}}
        </ul>
    </section>
</aside>