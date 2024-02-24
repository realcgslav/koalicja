<section class="latest-news">
    <h2>Latest News</h2>
    @if($latestNews)
        <ul>
            @foreach($latestNews as $news)
                <li>
                    <h3><a href="{{ get_permalink($news->ID) }}">{{ get_the_title($news->ID) }}</a></h3>
                </li>
            @endforeach
        </ul>
    @else
        <p>No latest news to display.</p>
    @endif
</section>