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
      <td class="RegularTable__bodyRowItem"><a href="">{{ $application->project->name }}</a></td>
      <td class="RegularTable__bodyRowItem"><a href="">{{ $application->user->sei }}&nbsp;{{ $application->user->mei }}</a></td>
      <td class="RegularTable__bodyRowItem">{{ $application->application_date }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
