<article @php(post_class('h-entry'))>
  <header>
    <h1 class="p-name">
      {!! get_the_title() !!}
    </h1>
  </header>

  <div class="e-content">
     {{-- Display the 'opis' field --}}
     @if($opis = get_field('opis'))
     {!! $opis !!}
   @endif

    {{-- Display the 'okladka' field --}}
    @if($okladka = get_field('okladka'))
      <div class="publication-cover">
        <img src="{{ $okladka['url'] }}" alt="{{ get_the_title() }}">
      </div>
    @endif

    {{-- Display the 'pdf' field --}}
    @if($pdf = get_field('pdf'))
      <div class="publication-pdf">
        <a href="{{ $pdf['url'] }}" target="_blank">Download PDF</a>
      </div>
    @endif
  </div>

  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>

  @php(comments_template())
</article>
