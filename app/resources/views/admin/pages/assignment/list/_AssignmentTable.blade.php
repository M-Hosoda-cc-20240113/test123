<table class="RegularTable">
  <thead class="RegularTable__head">
    <tr class="RegularTable__headRow">
      <th class="RegularTable__headRowItem">案件名</th>
      <th class="RegularTable__headRowItem">ユーザー名</th>
      <th class="RegularTable__headRowItem">稼働開始日</th>
    </tr>
  </thead>

  <tbody class="RegularTable__body">
    @foreach ($response->getAssignment() as $assignment)
    <tr class="RegularTable__bodyRow" data-href="">
      <td class="RegularTable__bodyRowItem"><a href="{{ route('project.detail', ['project_id' => $assignment->project->id] )}}">{{ $assignment->project->name ?? ''}}</a></td>
      <td class="RegularTable__bodyRowItem"><a href="{{ route('user.detail', ['id' => $assignment->user->id] )}}">{{ $assignment->user->sei }}&nbsp;{{ $assignment->user->mei ?? ''}}</a></td>
      <td class="RegularTable__bodyRowItem">{{ ViewHelper::dateReplace( $assignment->assignment_date ?? '' )}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
