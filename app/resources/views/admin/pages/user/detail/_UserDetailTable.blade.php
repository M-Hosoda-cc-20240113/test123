<table class="ProjectDetailTable">
  <tbody>
    <tr class="ProjectDetailTable__row">
      <th class="ProjectDetailTable__head">セイ</th>
      <td class="ProjectDetailTable__body">{{ $response->getUser()->sei_kana ?? ''}}</td>
      <th class="ProjectDetailTable__head">メイ</th>
      <td class="ProjectDetailTable__body">{{ $response->getUser()->mei_kana ?? ''}}</td>
    </tr>
    <tr class="ProjectDetailTable__row">
      <th class="ProjectDetailTable__head">案件名</th>
      <td class="ProjectDetailTable__body">
      @foreach ($response->getUser()->project as $project)
        {{ $project->name ?? ''}}
      @endforeach
      </td>
      <th class="ProjectDetailTable__head">保有ポイント</th>
      <td class="ProjectDetailTable__body">{{ $response->getUser()->points ?? ''}}</td>
    </tr>
    <tr class="ProjectDetailTable__row">
      <th class="ProjectDetailTable__head">Email</th>
      <td class="ProjectDetailTable__body">{{ $response->getUser()->email ?? ''}}</td>
      <th class="ProjectDetailTable__head">Tel</th>
      <td class="ProjectDetailTable__body">{{ $response->getUser()->tel ?? ''}}</td>
    </tr>
    <tr class="ProjectDetailTable__row">
      <th class="ProjectDetailTable__head">誕生日</th>
      <td class="ProjectDetailTable__body">{{ $response->getUser()->birthday ?? ''}}</td>
    </tr>
  </tbody>
</table>
