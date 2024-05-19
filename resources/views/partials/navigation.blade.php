@if ($navigation)
<div class="logo-wrapper">
  <div class="logo">
    <a href="/">
      <img src="{{ \Roots\asset('images/kzz_logo_wektor_f.svg')->uri() }}" alt="Example Image">
    </a>
  </div>
</div>

<div class="nav-container">
   <div class="nav-buttons">
    <button>
      <a href="/">
      <?xml version="1.0" encoding="UTF-8"?><svg width="30px" height="30px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M2 8L11.7317 3.13416C11.9006 3.04971 12.0994 3.0497 12.2683 3.13416L22 8" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M20 11V19C20 20.1046 19.1046 21 18 21H6C4.89543 21 4 20.1046 4 19V11" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
    </a>
    </button>
    <button class="hamburger hamburger--collapse" type="button">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
  </div>
  <ul class="nav">
    @foreach ($navigation as $item)
      <li class="nav-item {{ $item->slug }} {{ $item->active ? 'is-active' : '' }}">
        <a href="{{ $item->url }}">
          {{ $item->label }}
        </a>
      </li>
    @endforeach
    <li class="nav-item search-item">
      <form role="search" method="get" class="search-form" action="{{ home_url('/') }}">
        <label>
          <input type="search" class="search-field" placeholder="Szukaj&hellip;" value="{{ get_search_query() }}" name="s" />
        </label>
        <button type="submit" class="search-submit">
          <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M17 17L21 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M3 11C3 15.4183 6.58172 19 11 19C13.213 19 15.2161 18.1015 16.6644 16.6493C18.1077 15.2022 19 13.2053 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
        </button>
      </form>
    </li>
  </ul>
</div>
@endif
