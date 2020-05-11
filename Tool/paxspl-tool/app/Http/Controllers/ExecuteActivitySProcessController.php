<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\AssembleProcess;
use App\Activity;


class ExecuteActivitySProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project, AssembleProcess $execute_s_process)
    {
        return  view('projects.execute_s_process.activities.index', compact('execute_s_process', 'project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $activity = Activity::where('id', $request->activity)->first();
        $project = Project::where('id', $request->project)->first();
        $execute_s_process = AssembleProcess::where('id', $request->execute_s_process)->first();
        return view('projects.execute_s_process.activities.edit', compact('activity', 'execute_s_process', 'project'));
    }

   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
             
        ]);


        $activity =  Activity::find($request->activity);
        $activity->status = $request->status;
        $activity->update($request->all());


        $project = $request->project;
        $execute_s_process = $request->execute_s_process;

        return redirect()->route('projects.execute_s_process.activities.index', compact('execute_s_process', 'project'))
            ->with('success', 'Activity updated successfully');
    } 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
