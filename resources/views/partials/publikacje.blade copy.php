<h2 class="section-name">Publikacje</h2>
<div class="publikacje container">
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
</div>
<a href="#" class="section-next">Więcej publikacji</a>