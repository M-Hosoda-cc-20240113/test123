@php
  /**
   * @var \App\Services\AdminProject\ProjectDetail\ProjectDetailResponse $response
   */
@endphp
<table class="p-table js-app-table">
  <thead class="p-table__head">
  <tr class="p-table__headRow">
    <th class="p-table__headRowItem--soart">氏名</th>
    <th class="p-table__headRowItem--soart">登録日</th>
    <th class="p-table__headRowItem">稼働中</th>
    <th class="p-table__headRowItem">新規</th>
    <th class="p-table__headRowItem">電話番号</th>
    <th class="p-table__headRowItem">生年月日&nbsp;(年齢)</th>
    <th class="p-table__headRowItem">備考欄</th>
  </tr>
  </thead>

  <tbody class="p-table__body">
  @foreach ($response->getProject()->user_app as $user)
    <tr class="p-table__bodyRow--clickable" data-href="{{ route('user.detail', ['user_id' => $user->id]) }}">
      <td class="p-table__bodyRowItem--nowrap">{{ $user->sei ?? '' }}&#160;{{ $user->mei ?? '' }}</td>
      <td class="p-table__bodyRowItem">{{ ViewHelper::YmdReplace($user->created_at ?? '' )}}</td>
      <td class="p-table__bodyRowItem--textCenter">{{ $user->is_working ? '◎' : '-'}}</td>
      <td class="p-table__bodyRowItem--textCenter">{{ $user->is_new ? '◎' : '-'}}</td>
      <td class="p-table__bodyRowItem">{{ $user->tel ?? '' }}</td>
      <td class="p-table__bodyRowItem">{{ ViewHelper::BirthdayReplace($user->birthday ?? '')}}
        （{{ ViewHelper::CountAge($user->birthday ?? '')}}）
      </td>
      <td class="p-table__bodyRowItem">{{ $user->remarks ?? '' }}</td>
    </tr>
  @endforeach
  </tbody>
</table>
