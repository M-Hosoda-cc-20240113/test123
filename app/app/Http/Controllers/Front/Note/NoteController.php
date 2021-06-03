<?php

namespace App\Http\Controllers\Front\Note;

use App\Http\Controllers\Controller;
use App\Services\Note\NoteDetail\NoteDetailResponse;
use App\Services\Note\NoteDetail\NoteDetailService;

class NoteController extends Controller
{
    public function detail(int $note_id, NoteDetailService $note_detail_service)
    {
        $response = new NoteDetailResponse();

        $note = $note_detail_service->exec($note_id);

        $response->setNote($note);

        return view('front.pages.note.detail.detail', ['response' => $response]);
    }
}
