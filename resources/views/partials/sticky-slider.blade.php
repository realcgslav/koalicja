@if(!empty($sticky_posts))
  <div class="sticky-posts">
    @foreach($sticky_posts as $post)
      <article>
        <h2>{!! get_the_title($post->ID) !!}</h2>
        <div>
          {!! get_the_excerpt($post->ID) !!}
          <a href="{{ get_permalink($post->ID) }}">Czytaj więcej</a>
        </div>
      </article>
    @endforeach
  </div>
@endif
