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
    <li class="nav-item">
      <div class="contact-menu">
        <a href="mailto:kontakt@koalicjazywaziemia.pl">
          <?xml version="1.0" encoding="UTF-8"?><svg width="35px" height="35px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M9 9L13.5 12L18 9" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M3 13.5H5" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M1 10.5H5" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M5 7.5V7C5 5.89543 5.89543 5 7 5H20C21.1046 5 22 5.89543 22 7V17C22 18.1046 21.1046 19 20 19H7C5.89543 19 5 18.1046 5 17V16.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path></svg>
        </a>
        <a href="https://www.facebook.com/KoalicjaZywaZ">
          <?xml version="1.0" encoding="UTF-8"?><svg width="35px" height="35px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M17 2H14C12.6739 2 11.4021 2.52678 10.4645 3.46447C9.52678 4.40215 9 5.67392 9 7V10H6V14H9V22H13V14H16L17 10H13V7C13 6.73478 13.1054 6.48043 13.2929 6.29289C13.4804 6.10536 13.7348 6 14 6H17V2Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
        </a>
        <a href="https://x.com/ZiemiaZywa">
          <?xml version="1.0" encoding="UTF-8"?><svg width="35px" height="35px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M16.8198 20.7684L3.75317 3.96836C3.44664 3.57425 3.72749 3 4.22678 3H6.70655C6.8917 3 7.06649 3.08548 7.18016 3.23164L20.2468 20.0316C20.5534 20.4258 20.2725 21 19.7732 21H17.2935C17.1083 21 16.9335 20.9145 16.8198 20.7684Z" stroke="#000000" stroke-width="1.5"></path><path d="M20 3L4 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path></svg>
        </a>
        <a href="https://www.youtube.com/@koalicjazywaziemia3988">
          <?xml version="1.0" encoding="UTF-8"?><svg width="35px" height="35px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M14 12L10.5 14V10L14 12Z" fill="#000000" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M2 12.7075V11.2924C2 8.39705 2 6.94939 2.90549 6.01792C3.81099 5.08645 5.23656 5.04613 8.08769 4.96549C9.43873 4.92728 10.8188 4.8999 12 4.8999C13.1812 4.8999 14.5613 4.92728 15.9123 4.96549C18.7634 5.04613 20.189 5.08645 21.0945 6.01792C22 6.94939 22 8.39705 22 11.2924V12.7075C22 15.6028 22 17.0505 21.0945 17.9819C20.189 18.9134 18.7635 18.9537 15.9124 19.0344C14.5613 19.0726 13.1812 19.1 12 19.1C10.8188 19.1 9.43867 19.0726 8.0876 19.0344C5.23651 18.9537 3.81097 18.9134 2.90548 17.9819C2 17.0505 2 15.6028 2 12.7075Z" stroke="#000000" stroke-width="1.5"></path></svg>
        </a>
      </div>
    </li>
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
