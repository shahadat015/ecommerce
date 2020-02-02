<ol class="dd-list">
    @foreach ($menuItems as $menuItem)
    <li class="dd-item" data-id="{{ $menuItem->id }}">
    	@if(!$menuItem->is_root)
        	<span class="float-right mt-2 pt-1">
        		<a href="{{ route('admin.menus.items.edit', [$menu->id, $menuItem->id]) }}"><i class="fas fa-pencil-alt"></i></a>
        		<a href="{{ route('admin.menus.items.destroy', $menuItem->id) }}"class="btn-destroy mr-2 ml-2"><i class="fas fa-times"></i></a>
        	</span>
        @endif
        <div class="{{ $menuItem->is_root ? 'dd3-content' : 'dd-handle' }}">{{ $menuItem->name }}</div>
        @if ($menuItem->items->count())
            @include('admin.menu.menu-item', ['menuItems' => $menuItem->items])
        @endif
    </li>
    @endforeach
</ol>