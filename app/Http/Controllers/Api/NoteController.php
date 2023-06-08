<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Http\Requests\NotePostRequest;
use App\Jobs\DeleteRecord;
use Illuminate\Support\Facades\Queue;

use Illuminate\Support\Facades\Bus;

class NoteController extends Controller
{
    #Endpoint GET /api/v1/notes -> RETORNA TODOS LOS REGISTROS DESDE EL MÁS RECIENTE AL MÁS ANTÍGUO
    #Y QUÉ NO ESTÉN ARCHIVADOS, ESTOS SERÁN PAGINADOS CADA 10 REGISTROS
    public function getAllNotes(){
        $notes = Note::orderBy('created_at','desc')->where('archived', 0)->paginate(10);
        
        return response($notes, 200);
    }
    #Endpoint POST /api/v1/notes -> ALMACENA LA INFORMACIÓN DEL REGISTRO SI ESTA CUMPLE CON EL 
    #FORM REQUEST VALIDATOR 
    public function setNote(NotePostRequest $request){
        $request->validated();

        $note = new Note();
        $note->title = $request->input('title');
        $note->content = $request->input('content');
        $note->pinned = $request->input('pinned');
        $note->archived = $request->input('archived');
        $note->color = $request->input('color');
        $response = $note->save();

        if ($response){
            return response($note, 200);
        }
        return response()->json(['message' => 'Nota no creada'], 500);

    }
    #Endpoint PUT /api/v1/notes/{{id}} -> ACTUALIZA EL REGISTRO LOCALIZADO POR EL ID, TODOS 
    #LOS CAMPOS REQUERIDOS SIEMPRE Y CUANDO CUMPLA CON EL VALIDADOR
    public function updateNote(NotePostRequest $request, $id){
        $note = Note::find($id);
        if(is_null($note)){
            return response()->json(['Error' => 'Nota no encontrada'], 404);
        }
        $note->update($request->all());
        return response($note,200);
    }
    #Endpoint DELETE /api/v1/notes/{{id}} -> ELIMINA EL REGISTRO LOCALIZADO MEDIANTE EL ID
    public function deleteNote($id){
        $note = Note::find($id);
        if(is_null($note)){
            return response()->json(['Error' => 'Nota no encontrada'], 404);
        }
        $note->delete();
        return response()->json(['Mensaje'=>'Nota eliminada']);
    }

    #Endpoint POST /api/v1/notes/{{id}}/archived -> MODIFICA UN CAMPO DEL REGISTRO LOCALIZADO POR
    #EL ID PARA DEMOSTRAR QUE EL REGISTRO SE HA ARCHIVADO
    public function archiveNote($id){
        $note = Note::find($id);
        if(is_null($note)){
            return response()->json(['Error' => 'Nota no encontrada'], 404);
        }
        $note->archived = 1;
        $note->update();
        return response($note,200);
    }

    #Endpoint GET /api/v1/notes/archived -> RETORNA TODOS LOS REGISTROS QUE TENGAS EL CAMPO
    #'ARCHIVED' CON EL VALOR DE 1, ESTOS SERÁN PAGINADOS CADA 10 REGISTROS
    public function archivedNotes(){
        $notes = Note::where('archived', 1)->paginate(10);
        if(is_null($notes)){
            return response()->json(['Error' => 'Notasds no encontrada'], 404);
        }
        return response($notes,200);
    }

}
