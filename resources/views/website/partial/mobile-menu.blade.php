<nav class="sidebar-nav">
  <ul class="metismenu" id="auto-collapse-menu-demo">
    @php 
        $primaryMenus = $primaryMenu->menuItems()->whereIsRoot(0)->orderBy('position')->with('category', 'page')->get();
        $rootItem = $primaryMenu->menuItems()->whereIsRoot(1)->first();
    @endphp
    @foreach($primaryMenus as $menuItem)
        @if($menuItem->isCategoryType() && $rootItem->id == $menuItem->parent_id)
            <li class="{{ request()->is('product/category/'. $menuItem->category->slug) ? 'active' : '' }}">
                <a href="{{ route('product.category', $menuItem->category->slug) }}" aria-expanded="false"><i class="icofont-label"></i> {{ $menuItem->name }}
                    @php  
                        $subMenus = $menuItem->category->children()->with('children')->get(); 
                    @endphp
                    @if($subMenus->count())
                        <span class="fa plus-times"></span>
                    @endif
                </a>
                @if($subMenus->count())
                    @foreach($subMenus as $subMenu)
                        @if($subMenu->children()->count())
                        <ul class="metismenu" id="auto-collapse-menu-demo">
                            <li>
                                <a href="javascript:void(0)" aria-expanded="false"><i class="icofont-label"></i> {{ $subMenu->name}}  
                                     @if($subMenu->children()->count())
                                        <span class="fa plus-times"></span>
                                    @endif
                                </a>
                                <ul aria-expanded="false" class="animated fadeIn">
                                    @foreach($subMenu->children()->with('children')->get() as $subSubMenu)
                                        <li class="{{ request()->is('product/category/'. $subSubMenu->slug) ? 'active' : '' }}"><a href="{{ route('product.category', $subSubMenu->slug) }}">{{ $subSubMenu->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        @endif
                    @endforeach
                @endif
            </li>
        @endif

        @if($menuItem->isPageType() && $rootItem->id == $menuItem->parent_id)
            <li class="{{ request()->is($menuItem->page->slug) ? 'active' : '' }}">
                <a href="{{ url($menuItem->page->slug) }}" aria-expanded="false"><i class="icofont-label"></i> {{ $menuItem->name }}
                    @php  
                        $subMenus = $menuItem->items()->with('items')->get(); 
                    @endphp
                    @if($subMenus->count())
                        <span class="fa plus-times"></span>
                    @endif
                </a>
                @if($subMenus->count())
                    @foreach($subMenus as $subMenu)
                        @if($subMenu->items()->count())
                        <ul class="metismenu" id="auto-collapse-menu-demo">
                            <li>
                                <a href="javascript:void(0)" aria-expanded="false"><i class="icofont-label"></i> {{ $subMenu->name}}  
                                     @if($subMenu->items()->count())
                                        <span class="fa plus-times"></span>
                                    @endif
                                </a>
                                <ul aria-expanded="false" class="animated fadeIn">
                                    @foreach($subMenu->items()->with('items')->get() as $subSubMenu)
                                        <li class="{{ request()->is($menuItem->page->slug) ? 'active' : '' }}"><a href="{{ url($menuItem->page->slug) }}">{{ $subSubMenu->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        @endif
                    @endforeach
                @endif
            </li>
        @endif

        @if($menuItem->isUrlType() && $rootItem->id == $menuItem->parent_id)
            <li class="{{ request()->is($menuItem->url) ? 'active' : '' }}">
                <a href="{{ $menuItem->url }}" aria-expanded="false"><i class="icofont-label"></i> {{ $menuItem->name }}
                    @php  
                        $subMenus = $menuItem->items()->with('items')->get(); 
                    @endphp
                    @if($subMenus->count())
                        <span class="fa plus-times"></span>
                    @endif
                </a>
                @if($subMenus->count())
                    @foreach($subMenus as $subMenu)
                        @if($subMenu->items()->count())
                        <ul class="metismenu" id="auto-collapse-menu-demo">
                            <li>
                                <a href="javascript:void(0)" aria-expanded="false"><i class="icofont-label"></i> {{ $subMenu->name}}  
                                     @if($subMenu->items()->count())
                                        <span class="fa plus-times"></span>
                                    @endif
                                </a>
                                <ul aria-expanded="false" class="animated fadeIn">
                                    @foreach($subMenu->items()->with('items')->get() as $subSubMenu)
                                        <li class="{{ request()->is($menuItem->url) ? 'active' : '' }}"><a href="{{ $menuItem->url }}">{{ $subSubMenu->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        @endif
                    @endforeach
                @endif
            </li>
        @endif
    @endforeach
  </ul>
</nav>