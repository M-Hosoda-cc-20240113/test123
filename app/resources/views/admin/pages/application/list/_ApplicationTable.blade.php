@php
/**
 * @var \App\Services\Application\ApplicationList\ApplicationListResponse $response
 */
@endphp
<table class="p-table">
    <thead class="p-table__head">
    <tr class="p-table__headRow">
        <th class="p-table__headRowItem">案件名</th>
        <th class="p-table__headRowItem">ユーザー名</th>
        <th class="p-table__headRowItem">ステータス</th>
        <th class="p-table__headRowItem">応募日時</th>
        <th class="p-table__headRowItem">面談予定日</th>
        <th class="p-table__headRowItem">アサイン</th>
    </tr>
    </thead>

    <tbody class="p-table__body">
    @foreach ($response->getApplications() as $key => $application)
        <tr class="p-table__bodyRow @if($application['status'] === 2) js-button-active @endif" data-href="">
            <td class="p-table__bodyRowItem">
                <a class="d-block w-100"
                   href="{{ route('project.detail', ['project_id' => $application['projects']['id']] )}}">{{ $application['projects']['name'] ?? '' }}</a>
            </td>
            <td class="p-table__bodyRowItem">
                <a class="d-block w-100"
                   href="{{ route('user.detail', ['user_id' => $application['users']['id']] )}}">{{ $application['users']['sei'] ?? ''  }}
                    &nbsp;{{ $application['users']['mei'] ?? '' }}</a>
            </td>
            <td class="p-table__bodyRowItem">
                {{ ViewHelper::Status( $application['status'] ?? '' )}}<br>
            </td>
            <td class="p-table__bodyRowItem">
                {{ ViewHelper::YmdReplace( $application['created_at'] ?? '' )}}<br>
            </td>
            <td class="p-table__bodyRowItem">
                {{ ViewHelper::YmdReplace( $application['interview_date'] ?? '未定' )}}<br>
            </td>
            <td class="p-table__bodyRowItem--textCenter">
                <form action="{{ route('assignment.register') }}" method="post">
                    {{ @csrf_field() }}
                    <input type="hidden" name="user_id" value="{{ $application['users']['id'] }}">
                    <input type="hidden" name="project_id" value="{{ $application['projects']['id'] }}">
                    <button type="submit" disabled class="c-button c-button--disabled u-m0a">確定</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
