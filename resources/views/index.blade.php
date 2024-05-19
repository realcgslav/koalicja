@extends('layouts.app')

@section('content')
  @include('partials.sticky-slider')
  @include('partials.page-header')

  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Przepraszamy, nic nie znaleziono', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif
<div class="news-wrapper container">
  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
  @endwhile
</div>
<div class="pagination">
  {!! sage_numeric_pagination() !!}
</div>
@endsection