<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Project\CreateProjectRequest;
use App\Http\Requests\Admin\Project\csvCreateProjectRequest;
use App\Http\Requests\Admin\Project\DeleteProjectRequest;
use App\Http\Requests\Admin\Project\ProjectDisplayToggleRequest;
use App\Http\Requests\Admin\Project\UpdateProjectRequest;
use App\Services\AdminProject\CreateProject\CreateProjectParameter;
use App\Services\AdminProject\CreateProject\CreateProjectService;
use App\Services\AdminProject\csvCreateProject\csvCreateProjectParameter;
use App\Services\AdminProject\csvCreateProject\csvCreateProjectService;
use App\Services\AdminProject\DeletePosition\DeletePositionService;
use App\Services\AdminProject\DeleteProject\DeleteProjectParameter;
use App\Services\AdminProject\DeleteProject\DeleteProjectService;
use App\Services\AdminProject\ToggleProjectDisplay\ProjectDisplayToggleParameter;
use App\Services\AdminProject\ToggleProjectDisplay\ProjectDisplayToggleService;
use App\Services\AdminProject\ShowEditProjectForm\ShowEditProjectFormService;
use App\Services\AdminProject\ShowCreateProjectForm\ShowCreateProjectFormService;
use App\Services\AdminProject\ProjectList\ProjectListResponse;
use App\Services\AdminProject\ProjectList\ProjectListService;
use App\Services\AdminProject\ProjectDetail\ProjectDetailResponse;
use App\Services\AdminProject\ProjectDetail\ProjectDetailService;
use App\Services\AdminProject\UpdateProject\UpdateProjectParameter;
use App\Services\AdminProject\UpdateProject\UpdateProjectService;
use App\Services\AdminProject\DeleteSkill\DeleteSkillService;
use Illuminate\Support\Facades\DB;
use SplFileObject;

class ProjectController extends Controller
{
    /**
     *
     * Admin project index
     *
     * @param \App\Services\AdminProject\ProjectList\ProjectListService $project_list_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function list(ProjectListService $project_list_service)
    {
        $response = new ProjectListResponse();

        $projects = $project_list_service->exec();

        $response->setProjects($projects);

        return view('admin.pages.project.list.list', ['response' => $response]);
    }

    /**
     *
     * Admin project detail
     *
     * @param ProjectDetailService $project_detail_service
     * @param int $project_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function detail(ProjectDetailService $project_detail_service, int $project_id)
    {
        $response = new ProjectDetailResponse();

        $project = $project_detail_service->exec($project_id);

        $response->setProject($project);

        return view('admin.pages.project.detail.detail', ['response' => $response]);
    }

    /**
     * @param \App\Services\AdminProject\ShowCreateProjectForm\ShowCreateProjectFormService $create_project_form_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showCreateForm(ShowCreateProjectFormService $create_project_form_service)
    {
        $response = $create_project_form_service->exec();
        return view('admin.pages.project.create.create', ['response' => $response]);
    }

    /**
     * @param \App\Http\Requests\Admin\Project\CreateProjectRequest $request
     * @param \App\Services\AdminProject\CreateProject\CreateProjectService $create_project_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function create(
        CreateProjectRequest $request,
        CreateProjectService $create_project_service
    ) {
        $parameter = new CreateProjectParameter();
        $parameter->setAgentId($request->agent_id);
        $parameter->setStationId($request->station_id);
        $parameter->setName($request->name);
        $parameter->setMinUnitPrice($request->min_unit_price);
        $parameter->setMaxUnitPrice($request->max_unit_price);
        $parameter->setMinOperationTime($request->min_operation_time);
        $parameter->setMaxOperationTime($request->max_operation_time);
        $parameter->setDescription($request->description);
        $parameter->setRequiredCondition($request->required_condition);
        $parameter->setBetterCondition($request->better_condition);
        $parameter->setWorkStart($request->work_start);
        $parameter->setWorkEnd($request->work_end);
        $parameter->setWeeklyAttendance($request->weekly_attendance);
        $parameter->setFeature($request->feature);
        $parameter->setSkillIds($request->skill_ids);
        $parameter->setPositionIds($request->position_ids);

        $project = DB::transaction(function () use ($create_project_service, $parameter) {
            return $create_project_service->exec($parameter);
        });
        $project_id = $project->id;
        return redirect()->route('project.detail', ['project_id' => $project_id]);
    }

    /**
     * @param \App\Services\AdminProject\ShowEditProjectForm\ShowEditProjectFormService $show_edit_form_service
     * @param int $project_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showEditForm(ShowEditProjectFormService $show_edit_form_service, int $project_id)
    {
        $response = $show_edit_form_service->exec($project_id);
        return view('admin.pages.project.edit.edit', ['response' => $response]);
    }


    /**
     * @param \App\Http\Requests\Admin\Project\UpdateProjectRequest $request
     * @param \App\Services\AdminProject\UpdateProject\UpdateProjectService $update_project_service
     * @param \App\Services\AdminProject\DeleteSkill\DeleteSkillService $delete_skill_service
     * @param \App\Services\AdminProject\DeletePosition\DeletePositionService $delete_position_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function edit(
        UpdateProjectRequest $request,
        UpdateProjectService $update_project_service,
        DeleteSkillService $delete_skill_service,
        DeletePositionService $delete_position_service
    ) {
        $parameter = new UpdateProjectParameter();
        $project_id = $request->project_id;
        $parameter->setProjectId($project_id);
        $parameter->setAgentId($request->agent_id ?? null);
        $parameter->setStationId($request->station_id ?? null);
        $parameter->setName($request->name);
        $parameter->setMinUnitPrice($request->min_unit_price ?? null);
        $parameter->setMaxUnitPrice($request->max_unit_price ?? '');
        $parameter->setMinOperationTime($request->min_operation_time ?? null);
        $parameter->setMaxOperationTime($request->max_operation_time ?? null);
        $parameter->setDescription($request->description ?? '');
        $parameter->setRequiredCondition($request->required_condition ?? '');
        $parameter->setBetterCondition($request->better_condition ?? '');
        $parameter->setWorkStart($request->work_start ?? null);
        $parameter->setWorkEnd($request->work_end ?? null);
        $parameter->setWeeklyAttendance($request->weekly_attendance ?? null);
        $parameter->setFeature($request->feature ?? '');
        $parameter->setSkillIds($request->skill_ids ?? []);
        $parameter->setPositionIds($request->position_ids ?? []);

        $project = DB::transaction(function () use (
            $update_project_service,
            $delete_position_service,
            $parameter,
            $delete_skill_service,
            $project_id
        ) {
            $delete_position_service->deleteByProjectId($project_id);
            $delete_skill_service->deleteByProjectId($project_id);
            return $update_project_service->exec($parameter);
        });
        $project_update_id = $project->id;

        return redirect()->route('project.detail', ['project_id' => $project_update_id]);
    }

    /**
     * @param \App\Http\Requests\Admin\Project\DeleteProjectRequest $request
     * @param \App\Services\AdminProject\DeleteProject\DeleteProjectService $delete_project_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function delete(DeleteProjectRequest $request, DeleteProjectService $delete_project_service)
    {
        $parameter = new DeleteProjectParameter;
        $parameter->setProjectId($request->project_id);
        DB::transaction(function () use ($delete_project_service, $parameter) {
            $delete_project_service->exec($parameter);
        });
        return redirect()->route('project.list');
    }

    /**
     * @param ProjectDisplayToggleRequest $request
     * @param ProjectDisplayToggleService $project_display_toggle_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function toggle(
        ProjectDisplayToggleRequest $request,
        ProjectDisplayToggleService $project_display_toggle_service
    ) {
        $parameter = new ProjectDisplayToggleParameter;
        $parameter->setProjectId($request->project_id);
        DB::transaction(function () use ($project_display_toggle_service, $parameter) {
            $project_display_toggle_service->exec($parameter);
        });

        return redirect()->route('project.list');
    }

    /**
     * @param \App\Http\Requests\Admin\Project\csvCreateProjectRequest $request
     * @param \App\Services\AdminProject\csvCreateProject\csvCreateProjectService $csv_create_project_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function csvCreate(
        csvCreateProjectRequest $request,
        csvCreateProjectService $csv_create_project_service,
    ) {

        $parameter = new csvCreateProjectParameter();
        // アップロードファイルのファイルパスを取得
        $file_path = $request->file('csv_file')->path();
        // CSV取得
        $file = new SplFileObject($file_path);
        $file->setFlags(
            SplFileObject::READ_CSV |   // CSVとして行を読み込み
            SplFileObject::READ_AHEAD |       // 先読み／巻き戻しで読み込み
            SplFileObject::SKIP_EMPTY |       // 空行を読み飛ばす
            SplFileObject::DROP_NEW_LINE      // 行末の改行を読み飛ばす
        );
        // 一行ずつ処理
        foreach ($file as $line) {
            // ヘッダーを取得
            if (empty($header)) {
                $header = $line;
                continue;
            }
            $parameter->setAgentId((int)$line[0] === 0 ? null : (int)$line[0]);
            $parameter->setStationId((int)$line[1]);
            $parameter->setName($line[2]);
            $parameter->setMinUnitPrice((int)$line[3] === 0 ? null : (int)$line[3]);
            $parameter->setMaxUnitPrice((int)$line[4] === 0 ? null : (int)$line[4]);
            $parameter->setMinOperationTime((int)$line[5] === 0 ? null : (int)$line[5]);
            $parameter->setMaxOperationTime((int)$line[6] === 0 ? null : (int)$line[6]);
            $parameter->setDescription($line[7] == "" ? null : $line[7]);
            $parameter->setRequiredCondition($line[8] == "" ? null : $line[8]);
            $parameter->setBetterCondition($line[9] == "" ? null : $line[9]);
            $parameter->setWorkStart($line[10] == "" ? null : $line[10]);
            $parameter->setWorkEnd($line[11] == "" ? null : $line[11]);
            $parameter->setWeeklyAttendance((int)$line[12] === 0 ? null : (int)$line[12]);
            $parameter->setFeature($line[13] == "" ? null : $line[13]);
            $parameter->setSkillIds(explode(',', $line[14]));
            $parameter->setPositionIds(explode(',', $line[15]));
            DB::transaction(function () use ($csv_create_project_service, $parameter) {
                $csv_create_project_service->exec($parameter);
            });
        }
        return redirect()->route('project.list');
    }
}
