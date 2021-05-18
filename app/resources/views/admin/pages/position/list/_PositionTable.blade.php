<table class="p-table--short">
    <thead class="p-table__head">
    <tr class="p-table__headRow">
        <th class="p-table__headRowItem">ポジション名</th>
        <th class="p-table__headRowItem">登録日時</th>
        <th class="p-table__headRowItem"></th>
    </tr>
    </thead>

    <tbody class="p-table__body">
    @foreach ($response->getPositions() as $position)
        <tr class="p-table__bodyRow" data-href="">
            <td class="p-table__bodyRowItem">{{ $position->name }}</td>
            <td class="p-table__bodyRowItem">{{ ViewHelper::YmdReplace($position->created_at ?? '' )}}</td>
            <td class="p-table__bodyRowItem--textCenter">
                <form action="{{ route('position.delete') }}" method="post">
                    {{ @csrf_field() }}
                    <input type="hidden" name="position_id" value="{{ $position->id }}">
                    <button type="submit" class="c-button--warning u-w-30-pc js-alert-button">削除</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
