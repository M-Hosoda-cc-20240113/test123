@php
/**
 * @var \App\Models\Project $project
 * @var string $class
 */
@endphp

<div class="{{ $class ?? '' }} p-card">
  <a href="{{ route('front.project.detail', ['id' => $project->id]) }}" class="c-text--bold p-card__title">{{ $project->name }}</a>
  <table class="p-card__table">
    <tr>
      <td class="c-text">単価/月</td>
      <td class="c-text--warning c-text--bold">{{ $project->min_unit_price ?? '' }}〜{{ $project->max_unit_price }}万</td>
    </tr>
    <tr>
      <td class="c-text">最寄り駅</td>
      <td class="c-text">{{ $project->station->name }}</td>
    </tr>
  </table>
  <p class="c-text p-card__sub-title">応募スキル</p>
  @foreach($project->skills as $skill)
    @include('atoms.LinkButton', ['text' => $skill->name, 'class' => 'c-tag u-mb-5'])
  @endforeach
</div>
