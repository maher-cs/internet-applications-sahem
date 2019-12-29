<?php

namespace App\Http\Controllers;

use App\Project;
use App\Authority;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::where('status_id', 1)->with('authority')->with('status')->with('category')->get()->toArray();

        for($i = 0; $i < sizeof($projects); $i++)
        {
            $projects[$i]['status'] = $projects[$i]['status']['status'];
            unset($projects[$i]['status_id']);
            $projects[$i]['category'] = $projects[$i]['category']['category'];
            unset($projects[$i]['category_id']);
            unset($projects[$i]['authority_id']);
        }

        return response()->json($projects);
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
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $project = Project::findOrFail($id);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'no project found with id: ' . $id,
                'execption' => $exception
            ], 404);
        }
        
        $project = $project->where('id','=',$id)->with('authority')->with('status')->with('category')->with('offers')->get()->toArray()[0];
        
        // cleaning api
        $project['status'] = $project['status']['status'];
        unset($project['status_id']);
        $project['category'] = $project['category']['category'];
        unset($project['category_id']);
        unset($project['authority_id']);
        for($i = 0; $i < sizeof($project['offers']); $i++)
        {
            $project['offers'][$i]['status'] = $project['offers'][$i]['status']['status'];
            unset($project['offers'][$i]['status_id']);
        }

        return response()->json($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
