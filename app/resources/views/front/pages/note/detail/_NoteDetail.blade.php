@php
  /**
   * @var \App\Services\Note\NoteDetail\NoteDetailResponse $response
   */
@endphp
{{ $response->getNote()->contents ?? '' }}
