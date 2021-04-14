<table class="RegularTable">
  <thead class="RegularTable__head">
    <tr class="RegularTable__headRow">
      <th class="RegularTable__headRowItem">案件名</th>
      <th class="RegularTable__headRowItem">ユーザー名</th>
      <th class="RegularTable__headRowItem">応募日時</th>
    </tr>
  </thead>

  <tbody class="RegularTable__body">
    @foreach ($response->getApplications() as $application)
    <tr class="RegularTable__bodyRow" data-href="">
      <td class="RegularTable__bodyRowItem">
          @foreach($application->project_app as $project)
          <a href="{{ route('project.detail', ['project_id' => $project->id] )}}">{{ $project->name ?? '' }}</a>
          @endforeach
      </td>
      <td class="RegularTable__bodyRowItem">
          <a href="{{ route('user.detail', ['id' => $application->id] )}}">{{ $application->sei ?? ''  }}&nbsp;{{ $application->mei ?? '' }}</a>
      </td>
      <td class="RegularTable__bodyRowItem">
          @foreach($application->project_app as $project)
              {{ ViewHelper::dateReplace( $application->pivot->application_date ?? '' )}}
          @endforeach
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
