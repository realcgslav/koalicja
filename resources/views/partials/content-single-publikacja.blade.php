
@if($okladka = get_field('okladka'))
<div class="post-featured">
  <img src="{{ $okladka['url'] }}" alt="{{ get_the_title() }}">
</div>
@endif
<div class="single-container single-publikacja-container container">

<article @php(post_class('h-entry'))>
  <header>
      {{-- Display the 'okladka' field --}}
      @if($okladka = get_field('okladka'))
      <div class="publication-cover">
        <img src="{{ $okladka['url'] }}" alt="{{ get_the_title() }}">
      </div>
    @endif
      <div class="publikacja-single-text">
    <h1 class="p-name">
      {!! get_the_title() !!}
    </h1>
     {{-- Display the 'pdf' field --}}
     @if($pdf = get_field('pdf'))
     <div class="publication-pdf">
       <a href="{{ $pdf['url'] }}" target="_blank">Pobierz PDF</a>
     </div>
    </div>
   @endif

  </header>

  <div class="e-content">
     {{-- Display the 'opis' field --}}
     @if($opis = get_field('opis'))
     {!! $opis !!}
   @endif
  </div>

</article>
</div>

@include('partials.publikacje')