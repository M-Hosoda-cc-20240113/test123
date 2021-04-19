<table class="RegularTable">
    <thead class="RegularTable__head">
    <tr class="RegularTable__headRow">
        <th class="RegularTable__headRowItem">案件名</th>
        <th class="RegularTable__headRowItem">ユーザー名</th>
        <th class="RegularTable__headRowItem">稼働開始日</th>
    </tr>
    </thead>

    <tbody class="RegularTable__body">
    @foreach ($response->getAssignment() as $user)
        <tr class="RegularTable__bodyRow" data-href="">
            <td class="RegularTable__bodyRowItem">
                @foreach($user->project_assign as $project)
                    <a class="d-block w-100"
                       href="{{ route('project.detail', ['project_id' => $project->id] )}}">{{ $project->name ?? ''}}</a>
                @endforeach
            </td>
            <td class="RegularTable__bodyRowItem">
                <a class="d-block w-100" href="{{ route('user.detail', ['user_id' => $user->id] )}}">{{ $user->sei }}
                    &nbsp;{{ $user->mei ?? ''}}</a>
            </td>
            <td class="RegularTable__bodyRowItem">
                @foreach($user->project_assign as $project)
                    {{ ViewHelper::YmdReplace($project->pivot->created_at ?? '' )}}<br>
                @endforeach
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
