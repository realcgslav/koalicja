<article class="col-4" @php(post_class())>
  <header>
    <h2 class="entry-title">
      <a href="{{ get_permalink() }}">{!! get_the_title() !!}</a>
    </h2>
    @include('partials/entry-meta')
  </header>

  @if(has_post_thumbnail())
    <div class="post-thumbnail">
      {!! get_the_post_thumbnail(null, 'large') !!}
    </div>
  @endif

  <div class="entry-summary">
    @php(the_excerpt())
  </div>
</article>