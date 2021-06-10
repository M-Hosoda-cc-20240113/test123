@php
  /**
   * @var \App\Services\Note\NoteDetail\NoteDetailResponse $response
   */
@endphp
<p class="c-text">{{ $response->getNote()->contents ?? '' }}</p>
