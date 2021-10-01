<?php

namespace App\Http\Controllers\Admin\Note;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Note\CreateNoteRequest;
use App\Http\Requests\Admin\Note\DeleteNoteRequest;
use App\Http\Requests\Admin\Note\UpdateNoteRequest;
use App\Services\Note\CreateNote\CreateNoteParameter;
use App\Services\Note\CreateNote\CreateNoteService;
use App\Services\Note\AdminNoteDetail\NoteDetailResponse;
use App\Services\Note\AdminNoteDetail\NoteDetailService;
use App\Services\Note\DeleteNote\DeleteNoteParameter;
use App\Services\Note\DeleteNote\DeleteNoteService;
use App\Services\Note\NoteList\NoteListResponse;
use App\Services\Note\NoteList\NoteListService;
use App\Services\Note\ShowEditNoteForm\ShowEditNoteFormResponse;
use App\Services\Note\ShowEditNoteForm\ShowEditNoteFormService;
use App\Services\Note\UpdateNote\UpdateNoteParameter;
use App\Services\Note\UpdateNote\UpdateNoteService;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    /**
     * @param \App\Services\Note\NoteList\NoteListService $note_list_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function list(NoteListService $note_list_service)
    {
        $response = new NoteListResponse();

        $notes = $note_list_service->exec();

        $response->setNotes($notes);

        return view('admin.pages.note.list.list', ['response' => $response]);
    }

    /**
     * @param int $note_id
     * @param \App\Services\Note\AdminNoteDetail\NoteDetailService $note_detail_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function detail(int $note_id, NoteDetailService $note_detail_service)
    {
        $response = new NoteDetailResponse();

        $note = $note_detail_service->exec($note_id);

        $response->setNote($note);

        return view('admin.pages.note.detail.detail', ['response' => $response]);
    }

    /**
     * @param int $note_id
     * @param ShowEditNoteFormService $show_edit_note_form_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showEditForm(int $note_id, ShowEditNoteFormService $show_edit_note_form_service)
    {
        $response = new ShowEditNoteFormResponse();

        $note = $show_edit_note_form_service->exec($note_id);

        $response->setNote($note);

        return view('admin.pages.note.edit.edit', ['response' => $response]);
    }

    /**
     * @param UpdateNoteRequest $request
     * @param UpdateNoteService $update_note_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function edit(UpdateNoteRequest $request, UpdateNoteService $update_note_service)
    {
        $parameter = new UpdateNoteParameter();
        $parameter->setNoteId($request->note_id);
        $parameter->setTitle($request->title);
        $parameter->setContents($request->contents);

        $note = DB::transaction(function () use ($update_note_service, $parameter) {
            return $update_note_service->exec($parameter);
        });
        $note_id = $note->id;
        return redirect()->route('note.detail', ['note_id' => $note_id]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showCreateForm()
    {
        return view('admin.pages.note.create.create');
    }

    /**
     * @param \App\Http\Requests\admin\Note\CreateNoteRequest $request
     * @param \App\Services\Note\CreateNote\CreateNoteService $create_note_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function create(CreateNoteRequest $request, CreateNoteService $create_note_service)
    {
        $parameter = new CreateNoteParameter();
        $parameter->setTitle($request->title);
        $parameter->setContents($request->contents);

        $note = DB::transaction(function () use ($create_note_service, $parameter) {
            return $create_note_service->exec($parameter);
        });

        $note_id = $note->id;

        return redirect()->route('note.detail', ['note_id' => $note_id]);
    }

    /**
     * @param \App\Http\Requests\admin\Note\DeleteNoteRequest $request
     * @param \App\Services\Note\DeleteNote\DeleteNoteService $delete_note_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function delete(DeleteNoteRequest $request, DeleteNoteService $delete_note_service)
    {
        $parameter = new DeleteNoteParameter();
        $parameter->setNoteId($request->note_id);
        DB::transaction(function () use ($delete_note_service, $parameter){
            $delete_note_service->exec($parameter);
        });
        return redirect()->route('note.list');
    }
}
