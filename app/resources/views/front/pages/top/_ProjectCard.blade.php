<div class="ProjectCard mg-5">
  <a class="fw-bold d-block" href="{{ route('front.project.detail', ['project_id' => $project->id] )}}">{{ $project->name }}</a>
  <table class="mb-20 w-100">
    <tr>
      <td>単価/月</td>
      <td class="fw-bold text-secondary">{{ $project->min_unit_price }}〜{{ $project->max_unit_price }}万</td>
    </tr>
    <tr>
      <td>最寄り駅</td>
      <td>{{ $project->station->name }}駅</td>
    </tr>
  </table>
  <p class="mb-5">応募スキル</p>
  @foreach ($project->skills as $skill)
    <a href="/">@include('atoms.Tag', ['component' => 'Tag--link', 'text' => $skill->name, 'class' => 'mr-5 mb-5'])</a>
  @endforeach
</div>
