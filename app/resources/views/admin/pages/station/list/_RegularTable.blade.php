<table class="RegularTable">
    <thead class="RegularTable__head">
    <tr class="RegularTable__headRow">
        <th class="RegularTable__headRowItem">駅名</th>
        <th class="RegularTable__headRowItem">エリア名</th>
        <th class="RegularTable__headRowItem">登録日</th>
    </tr>
    </thead>

    <tbody class="RegularTable__body">
    @foreach ($response->getStations() as $station)
        <tr class="RegularTable__bodyRow">
            <td class="RegularTable__bodyRowItem">{{ $station->name ?? ''}}駅</td>
            <td class="RegularTable__bodyRowItem">{{ $station->area->name}}</td>
            <td class="RegularTable__bodyRowItem">{{ ViewHelper::YmdReplace($station->created_at ?? '' )}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="mt-30 pb-100">
    <a href="{{ route('station.create.form') }}" class="RegularBtn w-30 m0a ">新規登録する</a>
</div>
