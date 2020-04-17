<?php

namespace App\Http\Controllers;

use App\Team;
use App\Project;
use App\User;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {


        return  view('projects.teams.index', compact('project'));
    }

    public function roles(Project $project)
    {


        return  view('projects.teams.roles', compact('project'));
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
            'role' => 'required',
            'email' => 'required',
        ]);

        $user = new User();
        $user = User::where('email', $request->email)->first();
        $project = $request->project_id;
        if ($user == null) {
            return redirect()->route('projects.teams.index', compact('project'))
                ->with('error', 'User not found. Check user email!');
        }

        $team = Team::where('user_id', $user->id)->where('project_id', $request->project_id)->first();

        if ($team == null) {

            $team = new Team();
            $team->role = $request->role;
            $team->project_id = $request->project_id;
            $team->user_id = $user->id;
            $team->save();





            return redirect()->route('projects.teams.index', compact('project'))
                ->with('success', 'Team member added successfully');
        } else {
            return redirect()->route('projects.teams.index', compact('project'))
                ->with('error', 'Team member already in the project.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.teams.index', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $team = Team::where('id', $request->team)->first();
        $project = new Project();
        $project = Project::where('id', $request->project)->first();
        return view('projects.teams.edit', compact('team', 'project'));
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
            'company_role' => 'required',
            'spl_exp' => 'required',
            'retrieval_exp' => 'required',

        ]);

        $team =  Team::find($request->team);
        $team->fca = 0;
        $team->vsm = 0;
        $team->lsi = 0;
        $team->dependency = 0;
        $team->cluster = 0;
        $team->data_flow = 0;
        $team->update($request->all());
        $project = $request->project;

        return redirect()->route('projects.teams.index', compact('project'))
            ->with('success', 'Team member information saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Team $team)
    {
        $team->delete();

        return redirect()->route('projects.teams.index', compact('project'))
            ->with('success', 'Team member removed successfully');
    }

    /**
     * Generate report 
     *
     * @param  \Illuminate\Http\Project  $project
     * @return \Illuminate\Http\Response
     */

    public function generateDocx(Project $project)
    {
        setlocale(LC_TIME, 'es');

        $date = date('m-d-Y');

        $document = new \PhpOffice\PhpWord\TemplateProcessor('../templates/team_info.docx');

        $teams = $project->teams;
        $user = User::find(auth()->id());
        $document->setValue('admin', $user->name);
        $document->setValue('date', $date);
        $document->setValue('project', $project->title); 
        
        $i = 0;
        $document->cloneRow('m', count($teams));
        foreach ($teams as $team) {
            $i++;
            $document->setValue('m#' . $i, $i);
            $document->setValue('member.name#' . $i, $team->user->name);
            $document->setValue('member.email#' . $i, $team->user->email);
            $document->setValue('member.company_role#'. $i, $team->company_role);
            $document->setValue('member.spl_exp#'. $i, $team->spl_exp);
            $document->setValue('member.retrieval_exp#'. $i, $team->retrieval_exp);
            $document->setValue('member.obs#'. $i, $team->obs);
            $document->setValue('member.retrieval_role#'. $i, $team->retrieval_role);
        }






        $name = 'TeamInformationReport-' .  "$date" . '.docx';




 
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
