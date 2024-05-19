@if (has_post_thumbnail())
<div class="post-featured">
  {!! get_the_post_thumbnail(null, 'full') !!}
</div>
@endif

<div class="single-container container">
<article @php(post_class('h-entry'))>
  <header>
    <h1 class="p-name">
      {!! $title !!}
    </h1>

    @include('partials.entry-meta')
    <div class="post-categories">
      {!! get_the_category_list(' ') !!}
    </div>
  </header>

  <div class="e-content">
    @php(the_content())
  </div>

  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>

</article>

</div>
@include('partials.publikacje')