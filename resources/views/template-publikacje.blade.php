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
        <!-- Tu będą wstawiane wyniki -->
    </div>
</div>

@push('scripts')
<script src="{{ asset('scripts/publikacje-ajax.js') }}"></script>
@endpush
@endsection


