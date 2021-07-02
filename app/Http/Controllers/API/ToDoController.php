<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use Symfony\Component\HttpFoundation\Response;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::paginate(15);
        return NoteResource::collection($notes);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoteRequest $request)
    {
        $note = Note::create($request->all());
        $data = ["status" => 200, 'data' =>  new NoteResource($note)];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($noteid)
    {
        $note = Note::find($noteid);
        if ($note) {
            return $note;
        } else {
            return response()->json([
                "message" => "Note not found",
                "status" => 404,
            ], Response::HTTP_NOT_FOUND);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NoteRequest $request, $id)
    {
        $requestedData = $request->all();
        $note = Note::find($id);
        if ($note) {
            $note->update($requestedData);
            $data = ["status" => 200, 'data' =>  new NoteResource($note)];
            return response()->json($data);
        } else {
            return response()->json([
                "message" => "Failed to update",
                "status" => 404,
            ], Response::HTTP_NOT_FOUND);
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::find($id);
        if ($note) {
            $note->delete();
            $data = ["status" => 200, 'message' =>  "Deleted 'successfully"];
            return response()->json($data);
        } else {
            return response()->json([
                "message" => "Failed to Delete",
                "status" => 404,
            ], Response::HTTP_NOT_FOUND);
        }
    }
}
