<table class="RegularTable">
  <thead class="RegularTable__head">
    <tr class="RegularTable__headRow">
      <th class="RegularTable__headRowItem">ID</th>
      <th class="RegularTable__headRowItem">会社名</th>
      <th class="RegularTable__headRowItem">登録日時</th>
    </tr>
  </thead>

  <tbody class="RegularTable__body">
    @foreach ($response->getAgents() as $agent)
    <tr class="RegularTable__bodyRow">
      <td class="RegularTable__bodyRowItem">{{ $agent->id ?? ''}}</td>
      <td class="RegularTable__bodyRowItem">{{ $agent->name ?? ''}}</td>
      <td class="RegularTable__bodyRowItem">{{ ViewHelper::YmdReplace($agent->created_at ?? '' )}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="mt-30 pb-100">
    <a href="{{ route('agent.create.form') }}" class="RegularBtn w-30 m0a ">新規登録する</a>
</div>
