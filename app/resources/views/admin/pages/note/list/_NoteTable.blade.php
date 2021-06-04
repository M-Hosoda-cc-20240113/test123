@php
  /**
   * @var \App\Services\Note\NoteList\NoteListResponse $response
   */
@endphp
<table class="p-table">
  <thead class="p-table__head">
  <tr class="p-table__headRow">
    <th class="p-table__headRowItem">ID</th>
    <th class="p-table__headRowItem">タイトル</th>
    <th class="p-table__headRowItem">登録日時</th>
    <th class="p-table__headRowItem"></th>
  </tr>
  </thead>

  <tbody class="p-table__body">
  @foreach ($response->getNotes() as $note)
    <tr class="p-table__bodyRow--clickable" data-href="{{ route('note.detail', ['note_id' => $note->id])}}">
      <td class="p-table__bodyRowItem">{{ $note->id }}</td>
      <td class="p-table__bodyRowItem">{{ $note->title }}</td>
      <td class="p-table__bodyRowItem">{{ ViewHelper::YmdReplace($note->created_at ?? '')}}</td>
      <td class="p-table__bodyRowItem--textCenter">
        <form action="{{ route('note.delete') }}" method="post">
          {{ @csrf_field() }}
          <input type="hidden" name="note_id" value="{{ $note->id }}">
          <button type="submit" class="c-button--warning u-w-40-pc js-alert-button">削除</button>
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
