{{--
  Template Name: Publikacje
--}}

@extends('layouts.app')

@if ($the_query->have_posts())
  <div class="search-and-tags">
    <form method="get" action="">
      <input type="text" name="s" placeholder="Wyszukaj publikacje...">
      <button type="submit">Szukaj</button>
    </form>
    <ul class="tag-list">
      @foreach ($terms as $term)
        <li><a href="?tag={{ $term->slug }}">{{ $term->name }}</a></li>
      @endforeach
    </ul>
  </div>

  <div class="post-loop">
    @while ($the_query->have_posts())
      @php($the_query->the_post())
      <div class="post-item">
        <h2>{{ get_the_title() }}</h2>
        <div class="post-content">{{ get_the_content() }}</div>
      </div>
    @endwhile
  </div>

  <div class="pagination">
    {!! paginate_links(['total' => $the_query->max_num_pages]) !!}
  </div>

  @php(wp_reset_postdata())
@else
  <p>Nie znaleziono żadnych publikacji.</p>
@endif