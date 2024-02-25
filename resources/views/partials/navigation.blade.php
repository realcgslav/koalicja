@if ($navigation)
  <ul class="nav">
    @foreach ($navigation as $item)
      <li class="nav-item {{ $item->slug }} {{ $item->active ? 'active' : '' }}">
        <a href="{{ $item->url }}">
          {{ $item->label }}
        </a>

        @if ($item->children)
          <ul class="child-menu">
            @foreach ($item->children as $child)
              <li class="child-item {{ $child->slug }} {{ $child->active ? 'active' : '' }}">
                <a href="{{ $child->url }}">
                  {{ $child->label }}
                </a>
              </li>
            @endforeach
          </ul>
        @endif
      </li>
    @endforeach
  </ul>
@endif
