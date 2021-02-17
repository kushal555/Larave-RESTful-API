<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user_id;
        $meeting = $request->meeting_id;
        $response = [
            'message' => 'You are registred',
            'meeting-link' => 'api/meeting/5'
        ];
        return response()->json($response,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meeting = $id;
        $user = 5;
        $response = [
            'message' => 'You are unregister',
            'meeting-link' => 'api/meeting/5'
        ];
        return response()->json($response,201);
    }
}
