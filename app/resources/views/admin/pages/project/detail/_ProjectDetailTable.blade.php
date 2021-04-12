<table class="ProjectDetailTable">
  <tbody>
    <tr class="ProjectDetailTable__row">
      <th class="ProjectDetailTable__head">単価</th>
      <td class="ProjectDetailTable__body">{{ $response->getProject()->min_unit_price ?? ''}}〜{{ $response->getProject()->max_unit_price ?? ''}}万</td>
      <th class="ProjectDetailTable__head">案件内容</th>
      <td class="ProjectDetailTable__body">{{ $response->getProject()->description ?? ''}}</td>
      <th class="ProjectDetailTable__head">職種</th>
      <td class="ProjectDetailTable__body">
      @foreach ($response->getProject()->position as $position)
        @include('atoms.Tag', ['component' => 'Tag--link', 'text' => $position->name ?? '', 'class' => 'mr-5 mb-5'])
      @endforeach
      </td>
    </tr>
    <tr class="ProjectDetailTable__row">
      <th class="ProjectDetailTable__head">最寄り駅</th>
      <td class="ProjectDetailTable__body">{{ $response->getProject()->station->name ?? ''}}</td>
      <th class="ProjectDetailTable__head">必須</th>
      <td class="ProjectDetailTable__body">{{ $response->getProject()->required_condition ?? ''}}</td>
      <th class="ProjectDetailTable__head">スキル</th>
      <td class="ProjectDetailTable__body">
      @foreach ($response->getProject()->skill as $skill)
        @include('atoms.Tag', ['component' => 'Tag--link', 'text' => $skill->name ?? '', 'class' => 'mr-5 mb-5'])
      @endforeach
      </td>
    </tr>
    <tr class="ProjectDetailTable__row">
      <th class="ProjectDetailTable__head">就業時間</th>
      <td class="ProjectDetailTable__body">{{ $response->getProject()->work_start ?? ''}}〜{{ $response->getProject()->work_end ?? ''}}</td>
      <th class="ProjectDetailTable__head">尚可</th>
      <td class="ProjectDetailTable__body">{{ $response->getProject()->better_condition ?? ''}}</td>
      <th class="ProjectDetailTable__head">精算幅</th>
      <td class="ProjectDetailTable__body">{{ $response->getProject()->min_operation_time ?? ''}}時間〜{{ $response->getProject()->max_operation_time ?? ''}}時間</td>
    </tr>
  </tbody>
</table>
