<table class="p-table">
  <thead class="p-table__head">
  <tr class="p-table__headRow">
    <th class="p-table__headRowItem">案件名</th>
    <th class="p-table__headRowItem">登録日時</th>
    <th class="p-table__headRowItem">アサイン可否</th>
  </tr>
  </thead>

  <tbody class="p-table__body">
  @foreach ($response->getProjects() as $project)
    <tr class="p-table__bodyRow--clickable"
        data-href="{{ route('project.detail', ['project_id' => $project->id])}}">
      <td class="p-table__bodyRowItem">{{ $project->name ?? ''}}</td>
      <td class="p-table__bodyRowItem">{{ ViewHelper::YmdReplace($project->created_at ?? '' )}}</td>
      <td class="p-table__bodyRowItem--textCenter">{{ $project->decided ? '否' : '可'}}</td>
    </tr>
  @endforeach
  </tbody>
</table>
