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
  <!-- Add Bullets -->
  <div class="glide__bullets" data-glide-el="controls[nav]">
    <button class="glide__bullet" data-glide-dir="=0"></button>
    <button class="glide__bullet" data-glide-dir="=1"></button>
    <button class="glide__bullet" data-glide-dir="=2"></button>
  </div>
</div>
@endif
