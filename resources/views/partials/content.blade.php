<article class="news" @php(post_class())>
  @if(has_post_thumbnail())
    <div class="post-thumbnail">
      {!! get_the_post_thumbnail(null, 'large') !!}
    </div>
  @endif
<div class="news-text">
  <header>
    <h2 class="entry-title">
      <a href="{{ get_permalink() }}">{!! get_the_title() !!}</a>
    </h2>
    @include('partials/entry-meta')
  </header>

  <div class="entry-summary">
    @php(the_excerpt())
    <a href="{{ get_permalink() }}" class="read-more">Czytaj więcej</a>
  </div>
</div>
</article>