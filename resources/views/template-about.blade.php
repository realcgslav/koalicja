{{--
  Template Name: O nas
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
  @include('partials.struktura')
  @endwhile
@endsection
