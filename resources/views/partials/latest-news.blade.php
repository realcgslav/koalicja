@if ($latestNews)
  <div class="news-container container">
    @foreach ($latestNews as $newsItem)
      <div class="news-item" style="background-image: url('{{ get_the_post_thumbnail_url($newsItem->ID, 'news-thumbnail') }}')">
        <div class="news-title">{{ $newsItem->post_title }}</div>
      </div>
    @endforeach
  </div>
@endif
