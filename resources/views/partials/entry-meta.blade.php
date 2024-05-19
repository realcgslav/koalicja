@php
    $post_id = isset($post) ? $post->ID : get_the_ID();
@endphp
<time class="dt-published" datetime="{{ get_post_time('c', true, $post_id) }}">
  {{ get_the_date('', $post_id) }}
</time>