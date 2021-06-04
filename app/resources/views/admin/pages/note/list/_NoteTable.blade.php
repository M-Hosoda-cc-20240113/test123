@php
  /**
   * @var \App\Services\Note\NoteList\NoteListResponse $response
   */
@endphp
<table class="p-table--short">
  <thead class="p-table__head">
  <tr class="p-table__headRow">
    <th class="p-table__headRowItem">ID</th>
    <th class="p-table__headRowItem">タイトル</th>
    <th class="p-table__headRowItem">登録日時</th>
  </tr>
  </thead>

  <tbody class="p-table__body">
  @foreach ($response->getNotes()->sortByDesc('created_at') as $note)
    <tr class="p-table__bodyRow--clickable" data-href="{{ route('note.detail', ['note_id' => $note->id])}}">
      <td class="p-table__bodyRowItem">{{ $note->id }}</td>
      <td class="p-table__bodyRowItem">{{ $note->title }}</td>
      <td class="p-table__bodyRowItem">{{ ViewHelper::YmdReplace($note->created_at ?? '') }}</td>
    </tr>
  @endforeach
  </tbody>
</table>
