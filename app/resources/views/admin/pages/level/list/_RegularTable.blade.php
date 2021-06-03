<table class="p-table--short">
    <thead class="p-table__head">
    <tr class="p-table__headRow">
        <th class="p-table__headRowItem">ID</th>
        <th class="p-table__headRowItem">レベル名</th>
        <th class="p-table__headRowItem">登録日時</th>
        <th class="p-table__headRowItem"></th>
    </tr>
    </thead>

    <tbody class="p-table__body">
    @foreach ($response->getLevels() as $level)
        <tr class="p-table__bodyRow" data-href="">
            <td class="p-table__bodyRowItem">{{ $level->id }}</td>
            <td class="p-table__bodyRowItem">{{ $level->level }}</td>
            <td class="p-table__bodyRowItem">{{ ViewHelper::YmdReplace($level->created_at ?? '' )}}</td>
            <td class="p-table__bodyRowItem--textCenter">
                <form action="{{ route('level.delete') }}" method="post">
                    {{ @csrf_field() }}
                    <input type="hidden" name="level_id" value="{{ $level->id }}">
                    <button type="submit" class="c-button--warning u-w-35-pc js-alert-button">削除</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
