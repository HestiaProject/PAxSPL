<?php

namespace App\Http\Controllers;

use App\Team;
use App\Project;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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

        $team = new Team();
        $user = new User();
        $user = DB::table('users')->where('email', $request->email)->first();
        $project = $request->project_id;
        if ($user == null) {
            return redirect()->route('projects.teams.index', compact('project'))
                ->with('error', 'User not found. Check user email!');
        }

        $team = DB::table('teams')->where('user_id', $user->id)->where('project_id', $request->project_id)->first();

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request, User $user, Team $team)
    {
        $request->validate([
            'email' => 'required',
        ]);
        return $user->where('email', $request->input('email'))->get();
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
        //
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
}
