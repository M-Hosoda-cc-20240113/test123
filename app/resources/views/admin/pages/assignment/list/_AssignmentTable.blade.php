<table class="RegularTable">
  <thead class="RegularTable__head">
    <tr class="RegularTable__headRow">
      <th class="RegularTable__headRowItem">案件名</th>
      <th class="RegularTable__headRowItem">ユーザー名</th>
      <th class="RegularTable__headRowItem">稼働開始日</th>
    </tr>
  </thead>

  <tbody class="RegularTable__body">
    @foreach ($response->getAssignment() as $user_assign)
    <tr class="RegularTable__bodyRow" data-href="">
      <td class="RegularTable__bodyRowItem">
          @foreach($user_assign->project_assign as $project)
          <a href="{{ route('project.detail', ['project_id' => $project->id] )}}">{{ $project->name ?? ''}}</a>
          @endforeach
      </td>
      <td class="RegularTable__bodyRowItem">
          <a href="{{ route('user.detail', ['id' => $user_assign->id] )}}">{{ $user_assign->sei }}&nbsp;{{ $user_assign->mei ?? ''}}</a>
      </td>
      <td class="RegularTable__bodyRowItem">
          @foreach($user_assign->project_assign as $project)
          {{ ViewHelper::dateReplace( $project->pivot->assignment_date ?? '' )}}
          @endforeach
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
