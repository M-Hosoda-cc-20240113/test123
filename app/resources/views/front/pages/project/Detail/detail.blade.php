@extends('front.layout')

@section('title', '案件詳細|Aegis')
@section('body')
    @component('front.header.header', ['href' => route('front.index')])
        @include('front.header._link_mypage')
        @include('front.header._link_login_logout')
    @endcomponent
    <div class="Container mt-30 pb-100">
        @if(Auth::check())
            <form class="" action="{{ route('front.project.app', ['project_id' => $response->getProject()->id])}}"
                  method="POST">
                {{csrf_field()}}
                <div class="admin-project-detail">
                    <p class="fw-bold fs-20">{{ $response->getProject()->name ?? '' }}</p>
                    <hr class="Horizontal">
                    @include('front.pages.project.detail._ProjectDetailTable', ['response' => $response])
                </div>
                @foreach($response->getProject()->user_app as $user)
                    @if(Auth::id() === $user->id)
                        <p class="mt-20 ta-center fs-12">※応募済みです。担当営業からの連絡をお待ちください。</p>
                        <input type="hidden" name="app_user_id" value={{ $user->id }}>
                    @endif
                @endforeach
                @foreach($response->getProject()->user_assign as $user)
                    @if(Auth::id() === $user->id)
                        <p class="mt-20 ta-center fs-12">※稼働中です。ご連絡は担当営業にお願いいたします。</p>
                        <input type="hidden" name="assign_user_id" value={{ $user->id }}>
                    @endif
                @endforeach
                <button class="RegularBtn w-30 m0a" type="submit">応募する</button>
                <p class="mt-20 ta-center fs-12">※クリックで応募が完了します。担当営業が2営業日以内に電話で連絡いたします。</p>
            </form>
        @else
            <div class="admin-project-detail">
                <p class="fw-bold fs-20">{{ $response->getProject()->name ?? '' }}</p>
                <hr class="Horizontal">
                @include('front.pages.project.detail._ProjectDetailTable', ['response' => $response])
            </div>
            <a href="{{ route('register', ['project_id' => $response->getProject()] )}}" class="RegularBtn w-30 m0a">新規登録して応募する</a>
            <p class="mt-20 ta-center fs-12">※新規登録で応募が完了します。担当営業が2営業日以内に電話で連絡いたします。</p>
        @endif
    </div>
    @include('front.footer.footer')
@endsection
