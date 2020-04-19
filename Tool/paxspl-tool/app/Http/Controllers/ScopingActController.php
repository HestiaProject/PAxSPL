<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\AssembleProcess;
use App\Activity;

class ScopingActController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project, AssembleProcess $scoping_process)
    {
        return  view('projects.scoping_process.activities.index', compact('scoping_process', 'project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project, AssembleProcess $scoping_process, Request $request)
    {

        $phase = $request->phase;
        return view('projects.scoping_process.activities.create', compact('project', 'scoping_process', 'phase'));
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
            'description' => 'required',
        ]);

        $activity = new Activity();
        $activity->name = $request->name;

        $activity->phase = $request->phase;

        $activity->phase_id = 0;
        if ($activity->phase == "domain") {
            $activity->phase_id = 1;
        }
        if ($activity->phase == "asset") {
            $activity->phase_id = 2;
        }
        if ($activity->phase == "product") {
            $activity->phase_id = 3;
        }

        $activity->description = $request->description;
        $activity->assemble_process_id = $request->scoping_process;
        $activity->technique_id = $request->technique_id;
        $scoping_process = AssembleProcess::where('id', $request->scoping_process)->first();
        $n = $scoping_process->activities_phase($request->phase)->count();
        $activity->order = $n + 1;
        $activity->save();

        $project = Project::where('id', $request->project)->first();


        return redirect()->route('projects.scoping_process.activities.index', compact('scoping_process', 'project'))
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
        $scoping_process = AssembleProcess::where('id', $request->scoping_process)->first();
        $project = Project::where('id', $request->project)->first();
        return view('projects.scoping_process.activities.show', compact('project', 'scoping_process', 'activity'));
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
        $scoping_process = AssembleProcess::where('id', $request->scoping_process)->first();
        return view('projects.scoping_process.activities.edit', compact('activity', 'scoping_process', 'project'));
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
            'description' => 'required',
            'order' => 'required'
        ]);


        $activity =  Activity::find($request->activity);
        if ($request->order != $activity->order) {
            $activity2 =  Activity::where('order', '=', $request->order)
                ->where('phase', '=', $activity->phase)->where('assemble_process_id', '=', $request->scoping_process)
                ->update(['order' => $activity->order]);
        }
        $activity->update($request->all());


        $project = $request->project;
        $scoping_process = $request->scoping_process;

        return redirect()->route('projects.scoping_process.activities.index', compact('scoping_process', 'project'))
            ->with('success', 'Activity deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, AssembleProcess $scoping_process, Activity $activity)
    {

        $n = $scoping_process->activities_phase($activity->phase)->count();
        for ($i = $activity->order; $i < $n; $i++) {
            $activity2 =  Activity::where('phase', '=', $activity->phase)->where('order', '=', $i + 1)->where('assemble_process_id', '=', $scoping_process->id)
                ->update(['order' => $i]);
        }

        $activity->delete();

        return redirect()->route('projects.scoping_process.activities.index', compact('scoping_process', 'project'))
            ->with('success', 'Activity deleted successfully');
    }

    /**
     * Generate report 
     *
     * @param  \Illuminate\Http\Project  $project
     * @return \Illuminate\Http\Response
     */

    public function generateDocx(Project $project, AssembleProcess $scoping_process)
    {
        setlocale(LC_TIME, 'es');

        $date = date('m-d-Y');

        $document = new \PhpOffice\PhpWord\TemplateProcessor('../templates/activities.docx');


        $user = User::find(auth()->id());
        $document->setValue('doc', "Assembled Scoping Process");
        $document->setValue('admin', $user->name);
        $document->setValue('date', $date);
        $document->setValue('project', $project->title);
        $document->setValue('process', $scoping_process->name);

        $activities = $scoping_process->activities;
        $i = 0;
        $document->cloneRow('act', count($activities));
        foreach ($activities as $activity) {
            $i++;

            $document->setValue('act#' . $i, $i);
            $document->setValue('act.name#' . $i, $activity->name);
            if ($activity->phase == "SupportS") {
                $document->setValue('act.phase#' . $i, "Pre-Scoping");
            } else
                $document->setValue('act.phase#' . $i, $activity->phase);
            $document->setValue('act.description#' . $i, $activity->description);
            $document->setValue('act.technique#' . $i, $activity->technique->name);
        }






        $name = 'ScopingActivitysSelected-' .  "$date" . '.docx';





        $headers = array(
            //'Content-Type: application/msword',
            'Content-Type: vnd.openxmlformats-officedocument.wordprocessingml.document'
        );

        try {
            $document->saveAs(storage_path($name));
        } catch (Exception $e) {
        }

        return response()->download(storage_path($name));
    }
}
