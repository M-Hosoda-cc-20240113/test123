<table class="ProjectDetailTable">
    <tbody>
    <tr class="ProjectDetailTable__row">
        <th class="ProjectDetailTable__head">セイ</th>
        <td class="ProjectDetailTable__body">{{ $response->getUser()->sei_kana ?? ''}}</td>
        <th class="ProjectDetailTable__head">メイ</th>
        <td class="ProjectDetailTable__body">{{ $response->getUser()->mei_kana ?? ''}}</td>
    </tr>
    <tr class="ProjectDetailTable__row">
        <th class="ProjectDetailTable__head">Email</th>
        <td class="ProjectDetailTable__body">{{ $response->getUser()->email ?? ''}}</td>
        <th class="ProjectDetailTable__head">Tel</th>
        <td class="ProjectDetailTable__body">{{ $response->getUser()->tel ?? ''}}</td>
    </tr>
    <tr class="ProjectDetailTable__row">
        <th class="ProjectDetailTable__head">誕生日</th>
        <td class="ProjectDetailTable__body">{{ ViewHelper::BirthdayReplace($response->getUser()->birthday ?? '')}}</td>
        <th class="ProjectDetailTable__head">保有ポイント</th>
        <td class="ProjectDetailTable__body">{{ $response->getUser()->points ?? ''}}pt</td>
    </tr>
    <tr class="ProjectDetailTable__row">
        <th class="ProjectDetailTable__head">応募案件</th>
        <td class="ProjectDetailTable__body">
            @foreach ($response->getUser()->project_app as $key => $project)
                <a href="{{ route('project.detail', ['project_id' => $project->id] )}}">・{{ $project->name ?? ''}}<br></a>
                <p>面談予定日：{{ ViewHelper::YmdReplace($project->pivot->interview_date ?? '未定' )}}</p>
                <hr class="Horizontal">
            @endforeach
        </td>
        <th class="ProjectDetailTable__head">稼働案件</th>
        <td class="ProjectDetailTable__body">
            @foreach ($response->getUser()->project_assign as $project)
                <a href="{{ route('project.detail', ['project_id' => $project->id] )}}">{{ $project->name ?? ''}}<br></a>
                <p>稼働開始日：{{ ViewHelper::YmdReplace($project->pivot->assignment_start_date ?? '未定' )}}</p>
                <p>稼働終了日：{{ ViewHelper::YmdReplace($project->pivot->assignment_end_date ?? '未定' )}}</p>
                <hr class="Horizontal">
            @endforeach
        </td>
    </tr>
    <tr class="ProjectDetailTable__row">
        <th class="ProjectDetailTable__head">スキルレベル</th>
        <td class="ProjectDetailTable__body">
            @foreach ($response->getRelLevelSkillUser() as $LevelSkill)
                <span class="c-label u-mt-5 u-mr-10">{{ $LevelSkill->name }}（{{ $LevelSkill->level }})</span>
            @endforeach
        </td>
        <th class="ProjectDetailTable__head">ステータス</th>
        <td class="ProjectDetailTable__body">
            @foreach ($response->getUser()->project_status as $project)
                <a href="{{ route('project.detail', ['project_id' => $project->id] )}}">{{ $project->name ?? ''}}<br></a>
                <p>ステータス：{{ ViewHelper::Status($project->pivot->status ?? '未定' )}}</p>
                <hr class="Horizontal">
            @endforeach
        </td>
    </tr>
    <tr class="ProjectDetailTable__row">
        <th class="ProjectDetailTable__head">営業開始月</th>
        <td class="ProjectDetailTable__body">{{ ViewHelper::YmdReplace($response->getUser()->operation_start_month ?? '' )}}</td>
        <th class="ProjectDetailTable__head">備考欄</th>
        <td class="ProjectDetailTable__body">{{ $response->getUser()->remarks ?? '' }}</td>
    </tr>
    </tbody>
</table>
