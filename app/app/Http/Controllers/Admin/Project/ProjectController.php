<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Project\CreateProjectRequest;
use App\Http\Requests\Admin\Project\UpdateProjectRequest;
use App\Services\AdminProject\CreateProject\CreateProjectParameter;
use App\Services\AdminProject\CreateProject\CreateProjectService;
use App\Services\AdminProject\DeletePosition\DeletePositionService;
use App\Services\AdminProject\ShowEditProjectForm\ShowEditProjectFormService;
use App\Services\AdminProject\ShowCreateProjectForm\ShowCreateProjectFormService;
use App\Services\AdminProject\ProjectList\ProjectListResponse;
use App\Services\AdminProject\ProjectList\ProjectListService;
use App\Services\AdminProject\ProjectDetail\ProjectDetailResponse;
use App\Services\AdminProject\ProjectDetail\ProjectDetailService;
use App\Services\AdminProject\UpdateProject\UpdateProjectParameter;
use App\Services\AdminProject\UpdateProject\UpdateProjectService;
use App\Services\AdminProject\DeleteSkill\DeleteSkillService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @param int $id
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

        $parameter->setAgent($request->agent_id);
        $parameter->setStation($request->station_id);
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
        $parameter->setSkill1($request->skill_id_1);
        $parameter->setSkill2($request->skill_id_2);
        $parameter->setSkill3($request->skill_id_3);
        $parameter->setPosition1($request->position_id_1);
        $parameter->setPosition2($request->position_id_2);
        $parameter->setPosition3($request->position_id_3);

        $project = DB::transaction(function () use ($create_project_service, $parameter) {
            return $create_project_service->exec($parameter);
        });
        $project_id = $project->id;
        return redirect()->route('project.detail', ['project_id' => $project_id]);
    }

    public function showEditForm(ShowEditProjectFormService $show_edit_form_service, int $project_id)
    {
        $response = $show_edit_form_service->exec($project_id);
        return view('admin.pages.project.edit.edit', ['response' => $response]);
    }


    /**
     * @param \App\Http\Requests\Admin\Project\UpdateProjectRequest $request
     * @param \App\Services\AdminProject\UpdateProject\UpdateProjectService $update_project_service
     * @param $project_id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function edit(
        UpdateProjectRequest $request,
        UpdateProjectService $update_project_service,
        DeleteSkillService $delete_skill_service,
        DeletePositionService $delete_position_service,
        $project_id
    ) {
        $parameter = new UpdateProjectParameter();

        $parameter->setProjectId($project_id);
        $parameter->setAgent($request->agent_id ?? null);
        $parameter->setStation($request->station_id ?? null);
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

        return redirect()->route('project.detail', ['project_id' => $project_update_id]);;
    }

    /**
     *
     * Admin project delete
     * @var array
     */
    public function delete()
    {
        return 'Projects delete';
    }
}
