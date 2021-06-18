@php
/**
 * @var \App\Services\Assignment\AssignmentList\AssignmentListResponse $response
 */
@endphp
<table class="p-table">
    <thead class="p-table__head">
    <tr class="p-table__headRow">
        <th class="p-table__headRowItem">案件名</th>
        <th class="p-table__headRowItem">ユーザー名</th>
        <th class="p-table__headRowItem">稼働開始日</th>
        <th class="p-table__headRowItem">稼働終了日</th>
        <th class="p-table__headRowItem"></th>
    </tr>
    </thead>

    <tbody class="p-table__body">
    @foreach ($response->getAssignments() as $assignment)
        @php /** @var \App\Models\Assignment $assignment */ @endphp
        <tr class="p-table__bodyRow" data-href="">
            <td class="p-table__bodyRowItem--clickable">
                <a class="u-db u-w-160px-sp" href="{{ route('project.detail', ['project_id' => $assignment->project->id] )}}">{{ $assignment->project->name ?? ''}}</a>
            </td>
            <td class="p-table__bodyRowItem--clickable">
                <a class="u-db u-w-150px-sp"
                   href="{{ route('user.detail', ['user_id' => $assignment->user->id] )}}">{{ $assignment->user->sei }}
                    &nbsp;{{ $assignment->user->mei ?? ''}}</a>
            </td>
            <td class="p-table__bodyRowItem">
                {{ ViewHelper::YmdReplace( $assignment->assignment_start_date ?? '未定' )}}<br>
            </td>
            <td class="p-table__bodyRowItem">
                {{ ViewHelper::YmdReplace( $assignment->assignment_end_date ?? '未定' )}}<br>
            </td>
            <td class="p-table__bodyRowItem--textCenter">
                <form action="{{ route('assignment.delete') }}" method="post">
                    {{ @csrf_field() }}
                    <input type="hidden" name="user_id" value="{{ $assignment->user->id }}">
                    <input type="hidden" name="project_id" value="{{  $assignment->project->id }}">
                    <button type="submit" class="c-button--warning u-w-65px-sp js-alert-button">削除</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
