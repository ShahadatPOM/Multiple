<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{
    public function index(){
        return view('team.listTeam');

    }
    public function teamCreateForm(){
        return view('team.createTeam');
    }
    public function create(Request $request){
        $this->validate($request, [
           'name' => 'required',
           'leader_id' => 'nullable'
        ]);

        $team = create(Team::$request->all());
        $team->save();
    }
    public function edit($id){

    }
    public function update(Request $request, $di){

    }
    public function delete($id){

    }
}
