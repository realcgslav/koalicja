@if ($latestNews)
<h2 class="section-name">Aktualności</h2>
<div class="news-container container">
  @foreach ($latestNews as $newsItem)
  <a href="{{ $newsItem->permalink }}">
      <div class="news-item" style="background-image: url('{{ $newsItem->post_thumbnail_url }}')">
          <div class="news-title">
                  <h3 class="clamp-title">{{ $newsItem->post_title }}</h3>
                   @include('partials.entry-meta', ['post' => $newsItem])
          </div>
      </div>
    </a>
  @endforeach
</div>
<a href="#" class="section-next">Więcej aktualności</a>
@endif