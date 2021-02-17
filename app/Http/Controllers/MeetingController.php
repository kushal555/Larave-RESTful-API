<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeetingRequest;
use Illuminate\Http\Request;

class MeetingController extends Controller
{

    public function __construct()
    {
        $this->middleware('log')->only(['store','update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([],);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MeetingRequest $request)
    {
        $meeting = [
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'time' => $request->time,
            'id' => 5
        ];

        $response = [
            'message' => 'Meeting created',
            'meeting' => $meeting,
            "status" => true
        ];

        return response()->json($response,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $meeting = [
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'time' => $request->time,
            'id' => 5
        ];

        $response = [
            'message' => '',
            'meeting' => $meeting,
            "status" => true
        ];

        return response()->json($response,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $meeting = [
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'time' => $request->time,
            'id' => $id
        ];

        $response = [
            'message' => 'Meeting Updated',
            'meeting' => $meeting,
            "status" => true
        ];

        return response()->json($response,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = [
            'message' => 'Meeting deleted',
            "status" => true
        ];
        return response()->json($response,200);
    }

    public function getParticipants(Request $request){
        return ['title' => $request->title];
    }
}
