@extends('layouts.app')
@section('content')
<div class="publikacje-container">
    @if($publikacje->have_posts())
        @while($publikacje->have_posts()) 
            @php($publikacje->the_post())
            <article>
                <h2>{{ get_the_title() }}</h2>
                <div>{{ the_content() }}</div>
            </article>
        @endwhile
        @php(wp_reset_postdata())
    @else
        <p>{{ __('No publications found', 'sage') }}</p>
    @endif
</div>
@endsection