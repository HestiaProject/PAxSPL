<?php

namespace App\Http\Controllers;

use App\Team;
use App\Project;
use App\User;
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
        $teams = Team::latest()->paginate(5);

        return redirect()->route('projects.show', compact($project->id))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
        $user->where('email', $request->input('email'))->get();
        echo ($user->id);
        $team->role = $request->role;
        $team->project_id = $request->project_id;
        $team->user_id = $user->id;
        $team->save();

        return view('projects.show', compact('project'))
            ->with('success', 'Team updated successfully');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team, Project $project)
    {
        $team->delete();

        return redirect()->route('projects.show', compact('project'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
