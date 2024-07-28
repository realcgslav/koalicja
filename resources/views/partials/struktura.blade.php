@if (has_post_thumbnail())
<div class="post-featured">
  {!! get_the_post_thumbnail(null, 'full') !!}
</div>
@endif

<div class="about-container container">
   @include('partials.page-header')

   {{-- Wyświetlanie pola 'struktura' --}}
@if (get_field('struktura'))
<div class="struktura">
  {!! get_field('struktura') !!}
</div>
@endif
</div>

<div class="full-color">
    <div class="about-container container">
{{-- Wyświetlanie pola 'manifest' --}}
@if (get_field('manifest'))
  <div class="manifest">
    {!! get_field('manifest') !!}
  </div>
@endif
</div>
</div>

   @include('partials.orgs-slider')





