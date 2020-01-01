<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Project;
use App\Student;
use Illuminate\Http\Request;
use Validator;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), [ 
            'description' => 'required', 
            'project_id' => 'required', 
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $data = $request->all();

        try {
            Project::firstOrFail()->where('id', '=', $data['project_id'])->get()->toArray()[0];
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'مشروع غير موجود',
                'execption' => $exception
            ], 400);
        }

        $user = $request->user();
        $student_id = Student::where('user_id', '=', $user->id)->get()[0]['id'];

        $offer['description'] = $data['description'];
        $offer['project_id'] = $data['project_id'];
        $offer['student_id'] = $student_id;

        $c_offer = Offer::create($offer);

        return response()->json([
            'message'=>'تمت إضافة العرض بنجاح',
            'offer'=> $c_offer
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
