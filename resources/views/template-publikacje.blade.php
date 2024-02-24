@extends('layouts.app')

@section('content')
<div id="publikacje"></div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    fetch('/wp-json/sage/v1/publikacja')
    .then(response => response.json())
    .then(data => {
        const container = document.getElementById('publikacje');
        data.forEach(publikacja => {
            const div = document.createElement('div');
            let taxonomies = '';

            if(publikacja.taxonomies.length) {
                const tags = publikacja.taxonomies.map(t => t.name).join(', ');
                taxonomies = `<p>Tags: ${tags}</p>`;
            }

            div.innerHTML = `<h2>${publikacja.title}</h2><p>${publikacja.description}</p>${taxonomies}`;
            container.appendChild(div);
        });
    })
    .catch(error => console.error('Error:', error));
});
</script>
@endpush
