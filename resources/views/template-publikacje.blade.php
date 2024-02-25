@extends('layouts.app')

<div id="vue-publikacje">
  <button @@click="count++">
      Count is: <span v-text="count"></span>
  </button>
</div>

@push('scripts')
  <script src="@asset('scripts/vue-publikacje.js')"></script>
@endpush