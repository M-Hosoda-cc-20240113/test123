<table class="p-table">
  <thead class="p-table__head">
    <tr class="p-table__headRow">
      <th class="p-table__headRowItem">ID</th>
      <th class="p-table__headRowItem">会社名</th>
      <th class="p-table__headRowItem">電話番号</th>
      <th class="p-table__headRowItem">登録日時</th>
    </tr>
  </thead>

  <tbody class="p-table__body">
    @foreach ($response->getAgents() as $agent)
    <tr class="p-table__bodyRow">
      <td class="p-table__bodyRowItem">{{ $agent->id ?? ''}}</td>
      <td class="p-table__bodyRowItem">{{ $agent->name ?? ''}}</td>
      <td class="p-table__bodyRowItem"><a href="tel:{{ $agent->tel }}">{{ $agent->tel ?? ''}}</td>
      <td class="p-table__bodyRowItem">{{ ViewHelper::YmdReplace($agent->created_at ?? '' )}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
