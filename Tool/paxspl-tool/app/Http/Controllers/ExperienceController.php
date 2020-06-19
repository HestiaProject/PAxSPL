<?php

namespace App\Http\Controllers;

use App\Activity;
use App\AssembleProcess;
use App\Experience;
use App\Project;
use App\User;
use Exception;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project, AssembleProcess $exp_process)
    {
        return  view('projects.exp_process.experiences.index', compact('exp_process', 'project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project, AssembleProcess $exp_process)
    {


        return view('projects.exp_process.experiences.create', compact('project', 'exp_process'));
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
            'time' => 'required',
            'difficulty' => 'required',
            'obs' => 'required',
        ]);

        $experience = new Experience();
        $experience->time = $request->time;

        $experience->obs = $request->obs;
        $experience->difficulty = $request->difficulty;

        $experience->activity_id = $request->activity_id;
        $experience->assemble_process_id = $request->exp_process;


        $exp_process = AssembleProcess::find($request->exp_process);

        $experience->save();

        $activity = Activity::find($request->activity_id);
        $activity->experience_id = $experience->id;
        $activity->update();

        $project = Project::find($request->project);


        return redirect()->route('projects.exp_process.experiences.index', compact('exp_process', 'project'))
            ->with('success', 'Experience information saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $experience = Experience::find($request->experience);
        $project = Project::find($request->project);
        $exp_process = AssembleProcess::find($request->exp_process);
        return view('projects.exp_process.experiences.show', compact('project', 'exp_process', 'experience'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $experience = Experience::find($request->experience);
        $project = Project::find($request->project);
        $exp_process = AssembleProcess::find($request->exp_process);
        $activity = Activity::find($experience->activity_id);
        return view('projects.exp_process.experiences.edit', compact('experience', 'exp_process', 'project', 'activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'time' => 'required',
            'difficulty' => 'required',
            'obs' => 'required',
        ]);
        Activity::find($request->old_activity_id)->update(['experience_id' => null]);

        $experience = Experience::find($request->experience);

        $exp_process = AssembleProcess::find($request->exp_process);

        $experience->update($request->all());

        $activity = Activity::find($request->activity_id);
        $activity->experience_id = $experience->id;
        $activity->update();

        $project = Project::find($request->project);


        return redirect()->route('projects.exp_process.experiences.index', compact('exp_process', 'project'))
            ->with('success', 'Experience information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, AssembleProcess $exp_process, Experience $experience)
    {


        Activity::find($experience->activity_id)->update(['experience_id' => null]);


        $experience->delete();

        return redirect()->route('projects.exp_process.experiences.index', compact('exp_process', 'project'))
            ->with('success', 'Activity deleted successfully');
    }

    public function generateDocx(Project $project, AssembleProcess $exp_process)
    {
        setlocale(LC_TIME, 'es');

        $date = date('m-d-Y');

        $document = new \PhpOffice\PhpWord\TemplateProcessor('../templates/process_ex.docx');


        $user = User::find(auth()->id());

        $document->setValue('doc', "Process Experience Report");
        $document->setValue('admin', $user->name);
        $document->setValue('date', $date);
        $document->setValue('project', $project->title);
        $document->setValue('process', $exp_process->name);

        $activities = $exp_process->experiences;
        $i = 0;
        $document->cloneRow('act', count($activities));
        foreach ($activities as $experience) {
            $i++;

            $document->setValue('act#' . $i, $i);
            $document->setValue('act.name#' . $i, $experience->activity->name);
            $document->setValue('act.obs#' . $i, $experience->obs);
            $document->setValue('act.difficulty#' . $i, $experience->difficulty);
            $document->setValue('act.time#' . $i, $experience->time);
        }






        $name = 'ProcessExperienceReport-' .  "$date" . '.docx';





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
