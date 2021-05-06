@php
    /**
     * @var \App\Services\AdminUser\UserDetail\UserDetailResponse $response
     */
@endphp
<table class="p-itemDetailTable">
    <tbody>
    <tr class="p-itemDetailTable__row">
        <th class="p-itemDetailTable__head">セイ</th>
        <td class="p-itemDetailTable__body">{{ $response->getUser()->sei_kana ?? ''}}</td>
        <th class="p-itemDetailTable__head">メイ</th>
        <td class="p-itemDetailTable__body">{{ $response->getUser()->mei_kana ?? ''}}</td>
    </tr>
    <tr class="p-itemDetailTable__row">
        <th class="p-itemDetailTable__head">Email</th>
        <td class="p-itemDetailTable__body">{{ $response->getUser()->email ?? ''}}</td>
        <th class="p-itemDetailTable__head">Tel</th>
        <td class="p-itemDetailTable__body"><a href="tel:{{ $response->getUser()->tel }}">{{ $response->getUser()->tel ?? ''}}</a></td>
    </tr>
    <tr class="p-itemDetailTable__row">
        <th class="p-itemDetailTable__head">誕生日</th>
        <td class="p-itemDetailTable__body">{{ ViewHelper::BirthdayReplace($response->getUser()->birthday ?? '')}}</td>
        <th class="p-itemDetailTable__head">保有ポイント</th>
        <td class="p-itemDetailTable__body">{{ $response->getUser()->points ?? ''}}pt</td>
    </tr>
    <tr class="p-itemDetailTable__row">
        <th class="p-itemDetailTable__head">応募案件</th>
        <td class="p-itemDetailTable__body">
            @if($response->getUser()->project_app->count() === 0)
                <p>応募していません。</p>
            @endif
            @foreach ($response->getUser()->project_app as $project)
                <a class="c-text--bold u-dib u-mt-10 u-indent-1" href="{{ route('project.detail', ['project_id' => $project->id] )}}">・{{ $project->name ?? ''}}</a>
                <p class="u-indent">面談予定日：{{ ViewHelper::YmdReplace($project->pivot->interview_date ?? '未定' )}}</p>
            @endforeach
        </td>
        <th class="p-itemDetailTable__head">稼働案件</th>
        <td class="p-itemDetailTable__body">
            @if($response->getUser()->project_assign->count() === 0)
                <p>稼働していません。</p>
            @endif
            @foreach ($response->getUser()->project_assign as $project)
                <a class="c-text--bold u-dib u-mt-10 u-indent-1" href="{{ route('project.detail', ['project_id' => $project->id] )}}">・{{ $project->name ?? ''}}</a>
                <p class="u-indent">稼働開始日：{{ ViewHelper::YmdReplace($project->pivot->assignment_start_date ?? '未定' )}}</p>
                <p class="u-indent">稼働終了日：{{ ViewHelper::YmdReplace($project->pivot->assignment_end_date ?? '未定' )}}</p>
            @endforeach
        </td>
    </tr>
    <tr class="p-itemDetailTable__row">
        <th class="p-itemDetailTable__head">スキルレベル</th>
        <td class="p-itemDetailTable__body">
            @foreach ($response->getRelLevelSkillUser() as $LevelSkill)
                <span class="c-label u-mt-5 u-mr-10">{{ $LevelSkill->name }}（{{ $LevelSkill->level }})</span>
            @endforeach
        </td>
        <th class="p-itemDetailTable__head">ステータス</th>
        <td class="p-itemDetailTable__body">
            @if($response->getUser()->project_status->count() === 0)
                <p>ステータスがありません。</p>
            @endif
            @foreach ($response->getUser()->project_status as $project)
                <a class="c-text--bold u-dib u-mt-10 u-indent-1" href="{{ route('project.detail', ['project_id' => $project->id] )}}">・{{ $project->name ?? ''}}</a>
                <p class="u-indent">ステータス：{{ ViewHelper::Status($project->pivot->status ?? '未定' )}}</p>
            @endforeach
        </td>
    </tr>
    <tr class="p-itemDetailTable__row">
        <th class="p-itemDetailTable__head">営業開始月</th>
        <td class="p-itemDetailTable__body">{{ ViewHelper::YmdReplace($response->getUser()->operation_start_month ?? '' )}} </td>
        <th class="p-itemDetailTable__head">備考欄</th>
        <td class="p-itemDetailTable__body">{{ $response->getUser()->remarks ?? '' }}</td>
    </tr>
    </tbody>
</table>
