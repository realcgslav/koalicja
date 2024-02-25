{{--
  Template Name: Publikacje
--}}

@extends('layouts.app')

@section('content')
  <div id="publikacje">
    <input type="text" id="search" placeholder="Szukaj publikacji...">
    <div>
      @foreach($tags as $tag)
      <input type="checkbox" class="filter-tag" id="tag-{{ $tag->slug }}" data-tag="{{ $tag->slug }}">
      <label for="tag-{{ $tag->slug }}">{{ $tag->name }}</label>
    @endforeach
    </div>
    <div id="publikacje-list">
      @forelse($publikacje->posts as $post)
        <div class="publikacja">
          <h2>{{ $post->post_title }}</h2>
          <p>{{ $post->post_excerpt }}</p>
        </div>
      @empty
        <p>Brak publikacji do wyświetlenia.</p>
      @endforelse
    </div>
  </div>

  @push('scripts')
    <script src="{{ asset('scripts/publikacje.js') }}"></script>
  @endpush
@endsection


