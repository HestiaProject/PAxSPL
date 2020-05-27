<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\AssembleProcess;
use App\Activity;
use Exception;

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
        $request->validate([]);


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

    /**
     * Generate report 
     *
     * @param  \Illuminate\Http\Project  $project
     * @return \Illuminate\Http\Response
     */

    public function generateDocx(Project $project, AssembleProcess $execute_s_process)
    {
        setlocale(LC_TIME, 'es');

        $date = date('m-d-Y');

        $document = new \PhpOffice\PhpWord\TemplateProcessor('../templates/process.docx');


        $user = User::find(auth()->id());
        $document->setValue('doc', "Assembled Process");
        $document->setValue('admin', $user->name);
        $document->setValue('date', $date);
        $document->setValue('project', $project->title);
        $document->setValue('process', $execute_s_process->name);

        $activities = $execute_s_process->activities;
        $i = 0;
        $document->cloneRow('act', count($activities));
        foreach ($activities as $activity) {
            $i++;

            $document->setValue('act#' . $i, $i);
            $document->setValue('act.name#' . $i, $activity->name);
            if ($activity->phase == "SupportS") {
                $document->setValue('act.phase#' . $i, "Pre-Scoping");
            } else
                $document->setValue('act.phase#' . $i, $activity->phase());
            $document->setValue('act.description#' . $i, $activity->description);
            $document->setValue('act.technique#' . $i, $activity->technique->name);
            $j = 0;
            $artifacts = $activity->artifacts;
            $document->cloneRow('art#' . $i, count($artifacts));
            foreach ($artifacts as $artifact) {
                $j++;
                $newdate = date_create($artifact->artifact->last_update_date);
                $updated_date = date_format($newdate, 'm-d-Y');
                $document->setValue('art#' . $i . '#' . $j, $j);
                $io = 'Input';
                if ($artifact->io == 'o') {
                    $io = 'Output';
                }
                $document->setValue('art.io#' . $i . '#' . $j, $io);
                $document->setValue('art.name#' . $i . '#' . $j, $artifact->artifact->name);
                $document->setValue('art.type#' . $i . '#' . $j, $artifact->artifact->type);
                $document->setValue('art.description#' . $i . '#' . $j, $artifact->artifact->description);
                $document->setValue('art.extension#' . $i . '#' . $j, $artifact->artifact->extension);
                $document->setValue('art.external_link#' . $i . '#' . $j, $artifact->artifact->external_link);
                $document->setValue('art.last_update_date#' . $i . '#' . $j, $updated_date);
                $document->setValue('art.last_update_user#' . $i . '#' . $j, $artifact->artifact->update_user->name);
            }
        }


        $name = 'ScopingProcess-' .  "$date" . '.docx';




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
