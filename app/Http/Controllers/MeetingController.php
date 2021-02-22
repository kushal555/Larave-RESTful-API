<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeetingRequest;
use App\Http\Resources\MeetingCollection;
use App\Http\Resources\MeetingResource;
use App\Models\Meeting;
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
        // return response()->json(Meeting::all(),200);
        return new MeetingCollection(Meeting::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MeetingRequest $request)
    {
        return new MeetingResource($request->user()->meeting()->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Meeting $meeting)
    {
        return new MeetingResource($meeting);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MeetingRequest $request, Meeting $meeting)
    {

        $meeting->title = $request->title;
        $meeting->description = $request->description;
        $meeting->time = $request->time;
        $meeting->user_id = $request->user_id;
        $meeting->save();

        return new MeetingResource($meeting);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meeting $meeting)
    {
        $meeting->delete();
        return new MeetingResource($meeting);
    }

    public function getParticipants(Request $request){
        return ['title' => $request->title];
    }
}
