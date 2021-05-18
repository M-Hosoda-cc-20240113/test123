<table class="p-table">
  <thead class="p-table__head">
    <tr class="p-table__headRow">
      <th class="p-table__headRowItem">スキル名</th>
      <th class="p-table__headRowItem">登録日時</th>
      <th class="p-table__headRowItem"></th>
    </tr>
  </thead>

  <tbody class="p-table__body">
    @foreach ($response->getSkills() as $skill)
    <tr class="p-table__bodyRow" data-href="">
      <td class="p-table__bodyRowItem">{{ $skill->name }}</td>
      <td class="p-table__bodyRowItem">{{ ViewHelper::YmdReplace($skill->created_at ?? '')}}</td>
        <td class="p-table__bodyRowItem--textCenter">
            <form action="{{ route('skill.delete') }}" method="post">
                {{ @csrf_field() }}
                <input type="hidden" name="skill_id" value="{{ $skill->id }}">
                <button type="submit" class="c-button--warning u-w-35 js-alert-button">削除</button>
            </form>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
