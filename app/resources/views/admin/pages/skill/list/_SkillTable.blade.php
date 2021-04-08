<table class="RegularTable">
  <thead class="RegularTable__head">
    <tr class="RegularTable__headRow">
      <th class="RegularTable__headRowItem">スキル名</th>
      <th class="RegularTable__headRowItem">登録日時</th>
    </tr>
  </thead>

  <tbody class="RegularTable__body">
    @foreach ($response->getSkills() as $skill)
    <tr class="RegularTable__bodyRow" data-href="">
      <td class="RegularTable__bodyRowItem">{{ $skill->name }}</td>
      <td class="RegularTable__bodyRowItem">{{ $skill->created_at }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
