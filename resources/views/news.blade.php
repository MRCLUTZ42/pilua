
<div class="container">
    <h2>📰 Crypto News (GNews)</h2>
    <ul>
        @foreach($news as $item)
            <li style="margin-bottom: 15px;">
                <a href="{{ $item['url'] }}" target="_blank">
                    <strong>{{ $item['title'] }}</strong><br>
                    <small>{{ \Carbon\Carbon::parse($item['publishedAt'])->diffForHumans() }}</small>
                </a>
            </li>
        @endforeach
    </ul>
</div>

