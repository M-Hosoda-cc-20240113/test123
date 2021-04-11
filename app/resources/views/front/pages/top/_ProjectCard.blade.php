<div href="#" class="ProjectCard mg-5">
  <a class="mb-10 fw-bold d-block">{{ $project->name }}</a>
  <table class="mb-20 w-100">
    <tr>
      <td>単価/月</td>
      <td class="fw-bold text-secondary">{{ $project->max_unit_price }}万</td>
    </tr>
    <tr>
      <td>最寄り駅</td>
      <td>{{ $project->station->name }}駅</td>
    </tr>
  </table>
  <p class="mb-5">応募スキル</p>
  @foreach ($project->skill as $skill)
    <a href="hoge">@include('atoms.Tag', ['component' => 'Tag--link', 'text' => $skill->name, 'class' => 'mr-5 mb-5'])</a>
  @endforeach
</div>
