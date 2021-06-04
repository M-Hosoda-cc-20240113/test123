<?php

namespace App\Http\Controllers\Admin\Note;

use App\Http\Controllers\Controller;
use App\Services\Note\NoteList\NoteListResponse;
use App\Services\Note\NoteList\NoteListService;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function list(NoteListService $note_list_service)
    {
        $response = new NoteListResponse();

        $notes = $note_list_service->exec();

        $response->setNotes($notes);

        return view('admin.pages.note.list.list', ['response' => $response]);
    }

    public function showCreateForm()
    {
        //
    }

    public function create()
    {
        //
    }

    public function detail()
    {
        //
    }

    public function delete()
    {
        //
    }
}
