<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link{{ request()->routeIs('admin') ? '' : ' collapsed' }}" href="{{ route('admin') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link{{ request()->is('admin/category*') ? '' : ' collapsed' }}" href="{{ route('category') }}">
                <i class="bi bi-card-list"></i>
                <span>Category</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ request()->is('admin/items*') ? '' : ' collapsed' }}" href="{{ route('items') }}">
                <i class="bi bi-box"></i>
                <span>Items</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link{{ request()->is('admin/inquiries*') ? '' : ' collapsed' }}" href="{{ route('inquiries') }}">
                <i class="bi bi-envelope"></i>
                <span>Inquiries</span>
            </a>
        </li>
    </ul>
</aside><!-- End Sidebar-->
