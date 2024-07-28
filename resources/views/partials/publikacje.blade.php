<div class="full-color">
<h2 class="section-name">Publikacje</h2>
<div class="publikacje-front container">
    <div class="publikacje-wrapper">
        @foreach($publikacje as $post)
            <article class="publikacja">
                @if($post['okladka'])
                <a class="publikacja-link" href="{{ $post['link'] }}"><img src="{{ $post['okladka']['url'] }}" alt="{{ $post['title'] }}"></a>
                @endif
                @if($post['pdf'])
                    <a class="publikacja-pdf" href="{{ $post['pdf']['url'] }}" target="_blank">Pobierz</a>
                @endif
            </article>
        @endforeach
    </div>
</div>
<a href="#" class="section-next">Więcej publikacji</a>
</div>