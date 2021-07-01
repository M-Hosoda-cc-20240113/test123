<?php

namespace App\Http\Controllers\Front\Note;

use App\Http\Controllers\Controller;
use App\Services\Note\NoteDetail\NoteDetailResponse;
use App\Services\Note\NoteDetail\NoteDetailService;

class NoteController extends Controller
{
    /**
     * @param $note_id
     * @param \App\Services\Note\NoteDetail\NoteDetailService $note_detail_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function detail($note_id, NoteDetailService $note_detail_service)
    {
        $response = new NoteDetailResponse();

        $note = $note_detail_service->exec($note_id);

        $response->setNote($note);

        return view('front.pages.note.detail.detail', ['response' => $response]);
    }
}
