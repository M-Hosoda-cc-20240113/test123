<table class="p-table--short">
  <thead class="p-table__head">
    <tr class="p-table__headRow">
      <th class="p-table__headRowItem">ID</th>
      <th class="p-table__headRowItem">会社名</th>
      <th class="p-table__headRowItem">登録日時</th>
      <th class="p-table__headRowItem"></th>
    </tr>
  </thead>

  <tbody class="p-table__body">
    @foreach ($response->getAgents() as $agent)
    <tr class="p-table__bodyRow">
      <td class="p-table__bodyRowItem">{{ $agent->id ?? ''}}</td>
      <td class="p-table__bodyRowItem">{{ $agent->name ?? ''}}</td>
      <td class="p-table__bodyRowItem">{{ ViewHelper::YmdReplace($agent->created_at ?? '' )}}</td>
      <td class="p-table__bodyRowItem--textCenter">
          <form action="{{ route('agent.delete') }}" method="post">
              {{ @csrf_field() }}
              <input type="hidden" name="agent_id" value="{{ $agent->id }}">
              <button type="submit" class="c-button--warning js-alert-button">削除</button>
          </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
