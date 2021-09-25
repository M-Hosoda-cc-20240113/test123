@php
  /**
   * @var \App\Services\Note\NoteDetail\NoteDetailResponse $response
   */
@endphp
<p class="c-text">{!! nl2br(e($response->getNote()->contents ?? '')) !!}</p>
