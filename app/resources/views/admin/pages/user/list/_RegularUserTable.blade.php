@php
/**
 * @var \App\Services\User\UserList\UserListResponse $response
 */
@endphp
<table class="RegularTable">
  <thead class="RegularTable__head">
    <tr class="RegularTable__headRow">
      <th class="RegularTable__headRowItem">氏名</th>
      <th class="RegularTable__headRowItem">登録日</th>
      <th class="RegularTable__headRowItem">稼働中</th>
      <th class="RegularTable__headRowItem">電話番号</th>
      <th class="RegularTable__headRowItem">生年月日&nbsp;(年齢)</th>
    </tr>
  </thead>

  <tbody class="RegularTable__body">
    @foreach ($response->getUsers() as $user)
    <tr class="RegularTable__bodyRow" data-href="{{ route('user.detail', ['user_id' => $user->id]) }}">
      <td class="RegularTable__bodyRowItem">{{ $user->sei ?? '' }}&#160;{{ $user->mei ?? '' }}</td>
      <td class="RegularTable__bodyRowItem">{{ ViewHelper::YmdReplace($user->created_at ?? '' )}}</td>
      <td class="RegularTable__bodyRowItem--textCenter">{{ $user->is_working ? '◎' : '-'}}</td>
      <td class="RegularTable__bodyRowItem">{{ $user->tel ?? '' }}</td>
      <td class="RegularTable__bodyRowItem">{{ ViewHelper::YmdReplace($user->birthday ?? '')}}（{{ ViewHelper::CountAge($user->birthday ?? '')}}）</td>
    </tr>
    @endforeach
  </tbody>
</table>
