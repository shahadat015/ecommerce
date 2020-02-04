<div class="user_dashboard_sidebar">
    <nav>
        <ul>
            <li class="{{ request()->is('customer/dashboard') ? 'active' : '' }}"><a href="{{url('customer/dashboard')}}"><i class="fas fa-home"></i> Dashboard</a></li>
            <li class="{{ request()->is('customer/orders') ? 'active' : '' }}"><a href="{{url('customer/orders')}}"><i class="fas fa-shopping-cart"></i> Orders</a></li>
            <li class="{{ request()->is('customer/favorite') ? 'active' : '' }}"><a href="{{url('customer/favorite')}}"><i class="fas fa-heart"></i> Favorite Items</a></li>
            <li class="{{ request()->is('customer/account') ? 'active' : '' }}"><a href="{{url('customer/account')}}"><i class="fas fa-cog"></i> My Acount</a></li>
            <li><a href="{{url('customer/logout')}}"><i class="fas fa-power-off"></i> Logout</a></li>
        </ul>
    </nav>
</div>