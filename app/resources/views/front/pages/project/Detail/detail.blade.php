@extends('front.layout')

@section('title', '案件詳細|Aegis')
@section('body')
    @component('front.header.header', ['href' => route('front.index')])
        @include('front.header._link_mypage')
        @include('front.header._link_login_logout')
    @endcomponent
    <div class="l-container">
        <div class="l-main">
            @if(Auth::check())
                <form class="" action="{{ route('front.project.app') }}"
                      method="POST">
                    {{csrf_field()}}
                    <div class="p-mainItem">
                        <h2 class="p-level2Heading">{{ $response->getProject()->name ?? '' }}</h2>
                        <input type="hidden" name="project_id" value={{ $response->getProject()->id }}>
                        @include('front.pages.project.detail._ProjectDetailTable', ['response' => $response])

                        @if(Auth::getUser()->is_apply($response->getProject()->id))
                            <p class="mt-20 ta-center fs-12">※応募済みです。担当営業からの連絡をお待ちください。</p>
                        @elseif(Auth::getUser()->is_assign($response->getProject()->id))
                            <p class="mt-20 ta-center fs-12">※稼働中です。ご連絡は担当営業にお願いいたします。</p>
                        @else
                            <button class="c-button u-db u-w-30-pc u-m0a u-mt-20" type="submit">応募する</button>
                            <p class="c-text--center u-mt-20">※クリックで応募が完了します。担当営業が2営業日以内に電話で連絡いたします。</p>
                        @endif
                    </div>
                </form>
            @else
                <div class="p-mainItem">
                    <p class="p-level2Heading">{{ $response->getProject()->name ?? '' }}</p>
                    @include('front.pages.project.detail._ProjectDetailTable', ['response' => $response])

                    <a href="{{ route('register', ['project_id' => $response->getProject()] )}}"
                       class="c-button u-db u-m0a u-mt-30 u-w-30-pc">新規登録して応募する</a>
                    <p class="mt-20 ta-center fs-12">※新規登録で応募が完了します。担当営業が2営業日以内に電話で連絡いたします。</p>
                </div>
                <a href="{{ route('register', ['project_id' => $response->getProject()] )}}"
                   class="c-button u-db u-m0a u-mt-30 u-w-15-pc">新規登録して応募する</a>
                <p class="mt-20 ta-center fs-12">※新規登録で応募が完了します。担当営業が2営業日以内に電話で連絡いたします。</p>
            @endif
        </div>
    </div>
    @include('front.footer.footer')
@endsection
