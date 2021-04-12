<table class="ProjectDetailTable">
  <tbody>
    <tr class="ProjectDetailTable__row">
      <th class="ProjectDetailTable__head">セイ</th>
      <td class="ProjectDetailTable__body">{{ $response->getUser()->sei_kana ?? ''}}</td>
      <th class="ProjectDetailTable__head">メイ</th>
      <td class="ProjectDetailTable__body">{{ $response->getUser()->mei_kana ?? ''}</td>
    </tr>
    <tr class="ProjectDetailTable__row">
      <th class="ProjectDetailTable__head">案件内容</th>
      <td class="ProjectDetailTable__body">{{ $response->getUser()->description ?? ''}}</td>
      <th class="ProjectDetailTable__head">必須</th>
      <td class="ProjectDetailTable__body">{{ $response->getUser()->required_condition ?? ''}}</td>
    </tr>
    <tr class="ProjectDetailTable__row">
      <th class="ProjectDetailTable__head">就業時間</th>
      <td class="ProjectDetailTable__body">{{ $response->getUser()->work_start ?? ''}}〜{{ $response->getUser()->work_end ?? ''}}</td>
      <th class="ProjectDetailTable__head">精算幅</th>
      <td class="ProjectDetailTable__body">{{ $response->getUser()->min_operation_time ?? ''}}時間〜{{ $response->getUser()->max_operation_time ?? ''}}時間</td>
    </tr>
    <tr class="ProjectDetailTable__row">
      <th class="ProjectDetailTable__head">職種</th>
      <td class="ProjectDetailTable__body">
      @foreach ($response->getUser()->position as $position)
        @include('atoms.Tag', ['component' => 'Tag--link', 'text' => $position->name ?? '', 'class' => 'mr-5 mb-5'])
      @endforeach
      </td>
      <th class="ProjectDetailTable__head">スキル</th>
      <td class="ProjectDetailTable__body">
      @foreach ($response->getUser()->skill as $skill)
        @include('atoms.Tag', ['component' => 'Tag--link', 'text' => $skill->name ?? '', 'class' => 'mr-5 mb-5'])
      @endforeach
      </td>
    </tr>
    <tr class="ProjectDetailTable__row">
      <th class="ProjectDetailTable__head">尚可</th>
      <td class="ProjectDetailTable__body">{{ $response->getUser()->better_condition ?? ''}}</td>
    </tr>
  </tbody>
</table>
