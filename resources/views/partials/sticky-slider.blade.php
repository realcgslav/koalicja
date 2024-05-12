@if(!empty($sticky_posts))
  <div class="swiper">
    <div class="swiper-wrapper">
      @foreach($sticky_posts as $post)
        <div class="swiper-slide">
          <div class="post-slide">
            <div class="post-image">
              @if(has_post_thumbnail($post->ID))
                <img src="{{ get_the_post_thumbnail_url($post->ID) }}" alt="{!! get_the_title($post->ID) !!}">
              @endif
            </div>
            <div class="post-content">
              <h2>{!! get_the_title($post->ID) !!}</h2>
              <div>{!! get_the_excerpt($post->ID) !!}</div>
              <a href="{{ get_permalink($post->ID) }}">Czytaj więcej</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Navigation -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>
@endif
