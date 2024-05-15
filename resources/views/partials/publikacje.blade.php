<div class="full-color">
<h2 class="section-name">Publikacje</h2>
<div class="publikacje-front container">
    <div class="publikacje-wrapper">
        @foreach($publikacje as $post)
            <article class="publikacja">
                @if($post['okladka'])
                    <img src="{{ $post['okladka']['url'] }}" alt="{{ $post['title'] }}">
                @endif
                @if($post['pdf'])
                    <a href="{{ $post['pdf']['url'] }}" target="_blank">Pobierz</a>
                @endif
            </article>
        @endforeach
    </div>
</div>
<a href="#" class="section-next">Więcej publikacji</a>
</div>