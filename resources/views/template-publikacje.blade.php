{{--
  Template Name: Publikacje
--}}

@extends('layouts.app')
@section('content')
<section class="publikacje">
    <h2>Publikacje</h2>
    <div class="publikacje-wrapper">
        @foreach($publikacje as $post)
            <article class="publikacja">
                <h3>{{ $post['title'] }}</h3>
                @if($post['okladka'])
                    <img src="{{ $post['okladka']['url'] }}" alt="{{ $post['title'] }}">
                @endif
                <p>{{ $post['opis'] }}</p>
                @if($post['pdf'])
                    <a href="{{ $post['pdf']['url'] }}" target="_blank">Download PDF</a>
                @endif
            </article>
        @endforeach
    </div>
    @if($terms)
    <div class="tags">
        @foreach($terms as $term)
            <a href="#" data-tag="{{ $term->slug }}">{{ $term->name }}</a>
        @endforeach
    </div>
@endif
</section>
@endsection
