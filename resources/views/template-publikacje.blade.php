{{-- Template Name: Publikacje --}}

@extends('layouts.app')

@section('content')
<div class="publikacje-container">
    <div class="search-and-filters">
      <form id="search-form">
        <input type="text" name="search" placeholder="Wyszukaj publikacje..." id="search-input">
        <button type="submit">Szukaj</button>
      </form>
      
      <div id="filters">
        <h3>Filtry</h3>
        @foreach($tags as $tag)
          <label>
            <input type="checkbox" name="tag[]" value="{{ $tag->slug }}"> {{ $tag->name }}
          </label>
        @endforeach
      </div>
    </div>
  <div class="publikacje-results">
    {{-- Results will be displayed here by app.js --}}
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('scripts/app.js') }}"></script>
@endpush
