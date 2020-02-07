<div class="user_dashboard_sidebar">
    <nav>
        <ul>
            <li class="{{ request()->is('customer') ? 'active' : '' }}">
            	<a href="{{ route('customer.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
            <li class="{{ request()->is('customer/orders') ? 'active' : '' }}">
            	<a href="{{ route('customer.orders') }}"><i class="fas fa-shopping-cart"></i> Orders</a></li>
            <li class="{{ request()->is('customer/favorites') ? 'active' : '' }}">
            	<a href="{{ route('customer.favorites') }}"><i class="fas fa-heart"></i> Favorite Items</a></li>
            <li class="{{ request()->is('customer/account') ? 'active' : '' }}">
            	<a href="{{ route('customer.account') }}"><i class="fas fa-cog"></i> My Acount</a></li>
            <li><a href="{{ route('customer.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i> Logout</a></li>
        </ul>
    </nav>
</div>