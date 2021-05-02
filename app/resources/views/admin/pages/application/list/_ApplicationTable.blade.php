<table class="RegularTable">
    <thead class="RegularTable__head">
    <tr class="RegularTable__headRow">
        <th class="RegularTable__headRowItem">案件名</th>
        <th class="RegularTable__headRowItem">ユーザー名</th>
        <th class="RegularTable__headRowItem">応募日時</th>
        <th class="RegularTable__headRowItem">アサイン</th>
    </tr>
    </thead>

    <tbody class="RegularTable__body">
    @foreach ($response->getApplications() as $application)
        <tr class="RegularTable__bodyRow" data-href="">
            <td class="RegularTable__bodyRowItem">
                <a class="d-block w-100"
                   href="{{ route('project.detail', ['project_id' => $application->projects->id] )}}">{{ $application->projects->name ?? '' }}</a>
            </td>
            <td class="RegularTable__bodyRowItem">
                <a class="d-block w-100"
                   href="{{ route('user.detail', ['user_id' => $application->users->id] )}}">{{ $application->users->sei ?? ''  }}
                    &nbsp;{{ $application->users->mei ?? '' }}</a>
            </td>
            <td class="RegularTable__bodyRowItem">
                {{ ViewHelper::YmdReplace( $application->created_at ?? '' )}}<br>
            </td>
            <td class="RegularTable__bodyRowItem--textCenter">
                <form action="{{ route('assignment.register') }}" method="post">
                    {{ @csrf_field() }}
                    <input type="hidden" name="user_id" value="{{ $application->users->id }}">
                    <input type="hidden" name="project_id" value="{{ $application->projects->id }}">
                    <button type="submit" class="c-button u-m0a">確定</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
