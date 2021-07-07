@php
  /**
   * @var \App\Services\AdminProject\ProjectList\ProjectListResponse $response
   */
@endphp
<table class="p-table">
  <thead class="p-table__head">
  <tr class="p-table__headRow">
    <th class="p-table__headRowItem">ID</th>
    <th class="p-table__headRowItem">案件名</th>
    <th class="p-table__headRowItem">応募人数</th>
    <th class="p-table__headRowItem">稼働人数</th>
    <th class="p-table__headRowItem">アサイン可否</th>
    <th class="p-table__headRowItem">登録日時</th>
    <th class="p-table__headRowItem">一括削除</th>
  </tr>
  </thead>

  <tbody class="p-table__body">

  @foreach ($response->getProjects() as $project)
    <tr class="p-table__bodyRow" data-href="">
      <td class="p-table__bodyRowItem">{{ $project->id ?? ''}}</td>
      <td class="p-table__bodyRowItem--clickable "><a href="{{ route('project.detail', [$project->id]) }}"
                                           class="u-w-160px-sp">{{ $project->name ?? ''}}</a></td>
      <td class="p-table__bodyRowItem">{{ $project->user_app->count() ?? 0}}</td>
      <td class="p-table__bodyRowItem">{{ $project->user_assign->count() ?? 0}}</td>
      <td class="p-table__bodyRowItem">{{ $project->decided ? '×' : '◯'}}</td>
      <td class="p-table__bodyRowItem">{{ ViewHelper::YmdReplace($project->created_at ?? '' )}}</td>
      <td class="p-table__bodyRowItem">
        @if($project->user_app->count()==0 && $project->user_assign->count()==0)
        <label class="p-checkbox">
          <input type="checkbox" value="{{ $project->id }}" name="project_ids[]" class="js-checkbox-list">
          <div class="p-checkbox__indicator"></div>
        </label>
        @endif
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
