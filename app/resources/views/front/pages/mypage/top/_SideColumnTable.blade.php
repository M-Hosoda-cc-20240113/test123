<table class="SideColumnTable">
    <tbody>
    <tr>
        <th>氏名</th>
        <td>{{ $response->getUser()->sei ?? '' }}&#160;{{ $response->getUser()->mei ?? '' }}</td>
    </tr>
    <tr>
        <th>フリガナ</th>
        <td>{{ $response->getUser()->sei_kana ?? '' }}&#160;{{ $response->getUser()->mei_kana ?? '' }}</td>
    </tr>
    <tr>
        <th>メールアドレス</th>
        <td>{{ $response->getUser()->email ?? '' }}</td>
    </tr>
    <tr>
        <th>電話番号</th>
        <td>{{ $response->getUser()->tel ?? '' }}</td>
    </tr>
    <tr>
        <th>生年月日</th>
        <td>{{ ViewHelper::YmdReplace($response->getUser()->birthday ?? '' )}}</td>
    </tr>
    </tbody>
</table>
