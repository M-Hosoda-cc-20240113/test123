<table class="RegularTable">
  <thead class="RegularTable__head">
    <tr class="RegularTable__headRow">
      <th class="RegularTable__headRowItem">ポジション名</th>
      <th class="RegularTable__headRowItem">登録日時</th>
    </tr>
  </thead>

  <tbody class="RegularTable__body">
    @foreach ($response->getPositions() as $position)
    <tr class="RegularTable__bodyRow" data-href="">
      <td class="RegularTable__bodyRowItem">{{ $position->name }}</td>
      <td class="RegularTable__bodyRowItem">{{ $position->created_at }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
