<table class="p-table--short">
    <thead class="p-table__head">
    <tr class="p-table__headRow">
        <th class="p-table__headRowItem">ID</th>
        <th class="p-table__headRowItem">駅名</th>
        <th class="p-table__headRowItem">エリア名</th>
        <th class="p-table__headRowItem">登録日</th>
        <th class="p-table__headRowItem"></th>
    </tr>
    </thead>

    <tbody class="p-table__body">
    @foreach ($response->getStations() as $station)
        <tr class="p-table__bodyRow">
            <td class="p-table__bodyRowItem">{{ $station->id}}</td>
            <td class="p-table__bodyRowItem">{{ $station->name ?? ''}}駅</td>
            <td class="p-table__bodyRowItem">{{ $station->area->name}}</td>
            <td class="p-table__bodyRowItem">{{ ViewHelper::YmdReplace($station->created_at ?? '' )}}</td>
            <td class="p-table__bodyRowItem--textCenter">
                <form action="{{ route('station.delete') }}" method="post">
                    {{ @csrf_field() }}
                    <input type="hidden" name="station_id" value="{{ $station->id }}">
                    <button type="submit" class="js-alert-button c-button--warning">削除</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
