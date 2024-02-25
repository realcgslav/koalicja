{{--
  Template Name: Publikacje
--}}

@extends('layouts.app')

@section('content')
  <div id="publikacje">
    <input type="text" id="search" placeholder="Szukaj publikacji...">
    <div>
      @foreach($tags as $tag)
        <button class="filter-tag" data-tag="{{ $tag->slug }}">{{ $tag->name }}</button>
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


