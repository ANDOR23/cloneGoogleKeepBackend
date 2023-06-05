<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Http\Requests\NotePostRequest;

class NoteController extends Controller
{
    public function getAllNotes(){
        $notes = Note::orderBy('created_at','desc')->where('archived', 0)->paginate(10);
        
        return response($notes, 200);
    }

    public function setNote(NotePostRequest $request){
        $request->validated();

        $note = new Note();
        $note->title = $request->input('title');
        $note->content = $request->input('content');
        $note->pinned = $request->input('pinned');;
        $note->archived = $request->input('archived');;
        $response = $note->save();

        if ($response){
            return response($note, 200);
        }
        return response()->json(['message' => 'Nota no creada'], 500);

    }

    public function updateNote(NotePostRequest $request, $id){
        $note = Note::find($id);
        if(is_null($note)){
            return response()->json(['Error' => 'Nota no encontrada'], 404);
        }
        $note->update($request->all());
        return response($note,200);
    }

    public function deleteNote($id){
        $note = Note::find($id);
        if(is_null($note)){
            return response()->json(['Error' => 'Nota no encontrada'], 404);
        }
        $note->delete();
        return response()->json(['Mensaje'=>'Nota eliminada']);
    }

    public function archiveNote($id){
        $note = Note::find($id);
        if(is_null($note)){
            return response()->json(['Error' => 'Nota no encontrada'], 404);
        }
        $note->archived = 1;
        $note->update();
        return response($note,200);
    }

    public function archivedNotes(){
        $notes = Note::where('archived', 1)->paginate(10);
        if(is_null($notes)){
            return response()->json(['Error' => 'Notasds no encontrada'], 404);
        }
        return response($notes,200);
    }

}
