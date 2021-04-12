@extends('front.layout')

@section('title', 'トップページ|Aegis')

@section('body')
    @component('front.header.header', ['href' => route('front.index')])
        @include('front.header._link_login_logout')
    @endcomponent
    <div class="Container mt-30">
        @include('atoms.RegularInput', ['text' => 'フリーワードで探す'])
        @include('front.pages.top._ContentTab')
        <div class="welcome-Checkbox tab_content-js tab_active-js">
        @foreach ($response->getSkills() as $key => $skill)
            @include('atoms.Checkbox', ['class' => 'mr-10 mb-10 w-100px', 'index' => $key, 'text' => $skill->name])
        @endforeach
        </div>
        <div class="welcome-Checkbox tab_content-js">
        @foreach ($response->getPositions() as $key => $position)
            @include('atoms.Checkbox', ['class' => 'mr-10 mb-10 w-200px', 'index' => $key, 'text' => $position->name])
        @endforeach
        </div>
        <div class="welcome-Checkbox tab_content-js">
        @foreach ($response->getStations() as $key => $station)
            @include('atoms.Checkbox', ['class' => 'mr-10 mb-10 w-100px', 'index' => $key, 'text' => $station->name])
        @endforeach
        </div>
        <div class="welcome-ProjectCard mt-30">
            @foreach ($response->getProjects() as $project)
                @include('front.pages.top._ProjectCard', $project)
            @endforeach
        </div>
    </div>

    @include('front.footer.footer')
@endsection
