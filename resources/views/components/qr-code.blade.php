<div>
    @if ($url && is_string($url))  <!-- Pastikan $url adalah string -->
        {!! SimpleQrCode::size(200)->generate($url) !!}
    @else
        <p>No valid URL provided.</p>
    @endif
</div>
