<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\AssembleProcess;
use App\Activity;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project, AssembleProcess $assemble_process)
    {
        return  view('projects.assemble_process.activities.index', compact('assemble_process', 'project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project, AssembleProcess $assemble_process, Request $request)
    {

        $phase = $request->phase;
        return view('projects.assemble_process.activities.create', compact('project', 'assemble_process', 'phase'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'technique_id' => 'required',
        ]);

        $activity = new Activity();
        $activity->name = $request->name;

        $activity->phase = $request->phase;
        $activity->assemble_process_id = $request->assemble_process;
        $activity->technique_id = $request->technique_id;
        $assemble_process = AssembleProcess::where('id', $request->assemble_process)->first();
        $n = $assemble_process->activities_phase($request->phase)->count();
        $activity->order = $n + 1;
        $activity->save();

        $project = Project::where('id', $request->project)->first();


        return redirect()->route('projects.assemble_process.activities.index', compact('assemble_process', 'project'))
            ->with('success', 'Activity information saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $activity = Activity::where('id', $request->activity)->first();
        $assemble_process = AssembleProcess::where('id', $request->assemble_process)->first();
        $project = Project::where('id', $request->project)->first();
        return view('projects.assemble_process.activities.show', compact('project', 'assemble_process', 'activity'));
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
        $assemble_process = AssembleProcess::where('id', $request->assemble_process)->first();
        return view('projects.assemble_process.activities.edit', compact('activity', 'assemble_process', 'project'));
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
            'name' => 'required',
            'technique_id' => 'required',
            'order' => 'required'
        ]);

        $activity =  Activity::find($request->activity);
        $activity->update($request->all());


        $project = $request->project;
        $assemble_process = $request->assemble_process;

        return redirect()->route('projects.assemble_process.activities.index', compact('assemble_process', 'project'))
            ->with('success', 'Activity deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, AssembleProcess $assemble_process, Activity $activity)
    {
        $activity->delete();

        return redirect()->route('projects.assemble_process.activities.index', compact('assemble_process', 'project'))
            ->with('success', 'Activity deleted successfully');
    }
}
