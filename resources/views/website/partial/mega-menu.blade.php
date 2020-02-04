<nav>
    <ul>
        @php 
            $primaryMenus = $primaryMenu->menuItems()->where('is_root', 0)->with('category', 'page')->get();
            $rootItem = $primaryMenu->menuItems()->where('is_root', 1)->first();
        @endphp
        @foreach($primaryMenus as $menuItem)
        @if($menuItem->isCategoryType() && $rootItem->id == $menuItem->parent_id)
        <li class="{{ request()->is('product/category/'. $menuItem->category->slug) ? 'active' : '' }}">
            <a href="{{ url('product/category/'. $menuItem->category->slug) }}">{{ $menuItem->name }}</a>
            @php  
                $subMenus = $menuItem->category->children()->with('children')->get(); 
            @endphp
            @if($subMenus->count())
            <div class="mega_menu">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7">
                            <div class="mega_menu_link">
                                <div class="row">
                                    @foreach($subMenus as $subMenu)
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <div class="mega_menu_link_item">
                                               <a href="{{ url('product/category/'. $subMenu->slug) }}"><h4>{{ $subMenu->name }}</h4></a>
                                               @if($subMenu->children()->count())
                                                <ul>
                                                    @foreach($subMenu->children()->with('children')->get() as $subSubMenu)
                                                    <li><a href="{{ url('product/category/'. $subSubMenu->slug) }}">{{ $subSubMenu->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5">
                            <div class="mega_menu_link_image">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <div class="mega_menu_link_image_item">
                                            <a href="#">
                                                <img class="img-fluid" src="{{ asset('contents/website') }}/img/block_menu1.jpg" alt="menu-image">
                                                <h4>Get 20% Discount</h4>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <div class="mega_menu_link_image_item">
                                            <a href="#">
                                                <img class="img-fluid" src="{{ asset('contents/website') }}/img/block_menu2.jpg" alt="menu-image">
                                                <h4>Get 40% Discount</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </li>
        @endif
        @if($menuItem->isPageType() && $rootItem->id == $menuItem->parent_id)
        <li class="{{ request()->is($menuItem->page->slug) ? 'active' : '' }}">
            <a href="{{ url($menuItem->page->slug) }}">{{ $menuItem->name }}</a>
            @php 
                $subMenus = $menuItem->items()->with('items')->get(); 
            @endphp
            @if($subMenus->count())
            <div class="mega_menu">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7">
                            <div class="mega_menu_link">
                                <div class="row">
                                    @foreach($subMenus as $subMenu)
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <div class="mega_menu_link_item">
                                                <a href="{{ url($menuItem->page->slug) }}"><h4>{{ $subMenu->name }}</h4></a>
                                                @if($subMenu->items()->count())
                                                <ul>
                                                    @foreach($subMenu->items()->with('items')->get() as $subSubMenu)
                                                    <li><a href="{{ url($subSubMenu->page->slug) }}">{{ $subSubMenu->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5">
                            <div class="mega_menu_link_image">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <div class="mega_menu_link_image_item">
                                            <a href="#">
                                                <img class="img-fluid" src="{{ asset('contents/website') }}/img/block_menu1.jpg" alt="menu-image">
                                                <h4>Get 20% Discount</h4>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <div class="mega_menu_link_image_item">
                                            <a href="#">
                                                <img class="img-fluid" src="{{ asset('contents/website') }}/img/block_menu2.jpg" alt="menu-image">
                                                <h4>Get 40% Discount</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </li>
        @endif
        @if($menuItem->isUrlType() && $rootItem->id == $menuItem->parent_id)
        <li class="{{ request()->is($menuItem->url) ? 'active' : '' }}">
            <a href="{{url($menuItem->url) }}">{{ $menuItem->name}}</a>
            @php 
                $subMenus = $menuItem->items()->with('items')->get(); 
            @endphp
            @if($subMenus->count())
            <div class="mega_menu">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7">
                            <div class="mega_menu_link">
                                <div class="row">
                                    @foreach($subMenus as $subMenu)
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <div class="mega_menu_link_item">
                                                <a href="{{ url($subMenu->url) }}"><h4>{{ $subMenu->name }}</h4></a>
                                                @if($subMenu->items()->with('items')->count())
                                                <ul>
                                                    @foreach($subMenu->items()->with('items')->get() as $subSubMenu)
                                                    <li><a href="{{ url($subSubMenu->url) }}">{{ $subSubMenu->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5">
                            <div class="mega_menu_link_image">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <div class="mega_menu_link_image_item">
                                            <a href="#">
                                                <img class="img-fluid" src="{{ asset('contents/website') }}/img/block_menu1.jpg" alt="menu-image">
                                                <h4>Get 20% Discount</h4>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <div class="mega_menu_link_image_item">
                                            <a href="#">
                                                <img class="img-fluid" src="{{ asset('contents/website') }}/img/block_menu2.jpg" alt="menu-image">
                                                <h4>Get 40% Discount</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </li>
        @endif
        @endforeach
    </ul>
</nav>