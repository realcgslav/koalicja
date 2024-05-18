@if ($navigation)
<div class="nav-container">
  <div class="logo">
    <a href="/">
      <img src="path/to/logo.png" alt="Logo">
    </a>
  </div>
  <button class="hamburger" aria-label="Toggle navigation">☰</button>
  <ul class="nav">
    @foreach ($navigation as $item)
      <li class="nav-item {{ $item->slug }} {{ $item->active ? 'active' : '' }}">
        <a href="{{ $item->url }}">
          {{ $item->label }}
        </a>
      </li>
    @endforeach
  </ul>
</div>
@endif
