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
        <td class="ProjectDetailTable__body">{{ ViewHelper::YmdReplace($response->getUser()->birthday ?? '')}}</td>
        <th class="ProjectDetailTable__head">保有ポイント</th>
        <td class="ProjectDetailTable__body">{{ $response->getUser()->points ?? ''}}pt</td>
    </tr>
    <tr class="ProjectDetailTable__row">
        <th class="ProjectDetailTable__head">応募案件</th>
        <td class="ProjectDetailTable__body">
            @foreach ($response->getUser()->project_app as $project)
                <a href="{{ route('project.detail', ['project_id' => $project->id] )}}">・{{ $project->name ?? ''}}<br></a>
            @endforeach
        </td>
        <th class="ProjectDetailTable__head">稼働案件</th>
        <td class="ProjectDetailTable__body">
            @foreach ($response->getUser()->project_assign as $project)
                <a href="{{ route('project.detail', ['project_id' => $project->id] )}}">{{ $project->name ?? ''}}<br></a>
            @endforeach
        </td>
    </tr>
    <tr class="ProjectDetailTable__row">
        <th class="ProjectDetailTable__head">スキルレベル</th>
        <td class="ProjectDetailTable__body">
            @foreach ($response->getRelLevelSkillUser() as $LevelSkill)
                @include('atoms.Tag', ['text' => $LevelSkill->name.'（'.$LevelSkill->level.'）', 'class' => 'mg-5'])
            @endforeach
        </td>
    </tr>
    </tbody>
</table>
