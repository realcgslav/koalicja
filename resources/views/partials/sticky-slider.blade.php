@if(!empty($sticky_posts))
<div class="glide">
  <div data-glide-el="track" class="glide__track">
      <ul class="glide__slides">
          @foreach($sticky_posts as $post)
              <li class="glide__slide">
                  <div class="post-slide">
                      <div class="post-image">
                          @if(has_post_thumbnail($post->ID))
                              <img src="{{ get_the_post_thumbnail_url($post->ID) }}" alt="{!! get_the_title($post->ID) !!}">
                          @endif
                      </div>
                      <div class="circle"></div>
                      <div class="post-content">
                          <h2>{!! get_the_title($post->ID) !!}</h2>
                          <div>{!! get_the_excerpt($post->ID) !!}</div>
                          <a href="{{ get_permalink($post->ID) }}">Czytaj więcej</a>
                      </div>
                  </div>
              </li>
          @endforeach
      </ul>
  </div>
  <!-- Add Controls -->
  <div class="glide__arrows" data-glide-el="controls">
      <div class="glide__arrow glide__arrow--left" data-glide-dir="<"><?xml version="1.0" encoding="UTF-8"?><svg width="50px" height="50px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15 6L9 12L15 18" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></div>
      <div class="glide__arrow glide__arrow--right" data-glide-dir=">"><?xml version="1.0" encoding="UTF-8"?><svg width="50px" height="50px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 6L15 12L9 18" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></div>
  </div>
  <!-- Add Bullets -->
</div>
@endif
