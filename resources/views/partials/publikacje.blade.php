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
</section>