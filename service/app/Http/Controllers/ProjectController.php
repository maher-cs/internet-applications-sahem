<?php

namespace App\Http\Controllers;

use App\Project;
use App\Authority;
use App\Category;
use App\Skill;
use Validator;

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
        $projects = Project::where('status_id', 1)->with('authority')->with('status')->with('category')->with('offers')->get()->toArray();

        for($i = 0; $i < sizeof($projects); $i++)
        {
            $projects[$i]['status'] = $projects[$i]['status']['status'];
            unset($projects[$i]['status_id']);
            $projects[$i]['category'] = $projects[$i]['category']['category'];
            unset($projects[$i]['category_id']);
            unset($projects[$i]['authority_id']);
            $projects[$i]['offers_num'] = count($projects[$i]['offers']);
            unset($projects[$i]['offers']);
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
        $validator = Validator::make($request->all(), [ 
            'title' => 'required', 
            'category' => 'required', 
            'description' => 'required', 
            'end_date' => 'required', 
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $data = $request->all();
        $user = $request->user();
        $categorystr = $data['category'];
        $category_id = Category::where('category','=', $categorystr)->get()[0]['id'];
        $authority_id = Authority::where('user_id', '=', $user->id)->get()[0]['id'];

        $project['title'] = $data['title'];
        $project['category_id'] = $category_id;
        $project['description'] = $data['description'];
        $project['end_date'] = $data['end_date'];
        $project['authority_id'] = $authority_id;

        $c_project = Project::create($project);

        $skills = $data['skills'];
        
        $skillsIds = Skill::whereIn('skill', $skills)->get();
        Project::find($c_project->id)->skills()->attach($skillsIds);

        return response()->json([
            'message'=>'تمت إضافة المشروع بنجاح',
            'project'=> $c_project
        ], 200);

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
        
        $project = $project->where('id','=',$id)->with('authority')->with('status')->with('category')->with('offers')->with('skills')->get()->toArray()[0];
        
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

            $project['offers'][$i]['student']['major'] = $project['offers'][$i]['student']['major']['major'];
            unset($project['offers'][$i]['student']['major_id']);
        }

        for($i = 0; $i < sizeof($project['skills']); $i++)
        {
            $project['skills'][$i] = $project['skills'][$i]['skill'];
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
