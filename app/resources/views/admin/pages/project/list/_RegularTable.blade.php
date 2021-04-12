<table class="RegularTable">
  <thead class="RegularTable__head">
    <tr class="RegularTable__headRow">
      <th class="RegularTable__headRowItem">案件名</th>
      <th class="RegularTable__headRowItem">登録日時</th>
      <th class="RegularTable__headRowItem">アサイン可否</th>
    </tr>
  </thead>

  <tbody class="RegularTable__body">
    @foreach ($response->getProjects() as $project)
    <tr class="RegularTable__bodyRow"
        data-href="{{ route('project.detail', ['project_id' => $project->id])}}">
      <td class="RegularTable__bodyRowItem">{{ $project->name }}</td>
      <td class="RegularTable__bodyRowItem">{{ $project->created_at }}</td>
      <td class="RegularTable__bodyRowItem--textCenter">{{ $project->decided ? '否' : '可'}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
