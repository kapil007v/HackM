<?php

namespace App\Http\Controllers;
use App\University;
use App\User;
use Auth;

use Illuminate\Http\Request;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $university = Auth::user()->university;
        return view('university.index',['university'=>$university]);
    }

    public function showCollege()
    {
        $university = Auth::user()->university;
        // dd($university->pendingCollege);
        return view('university.college_show',['university'=>$university]);
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
        
        // dd($request);
        //create user for login 
        $user = new User;
        $user->email = $request->email;
        // $user->email = 'asdj';
        $user->password = bcrypt($request->password);
        $user->role = 'uni';
        //$user->name = $request->name;
        $user->save();

        // create university
        $university=new University;
        $university->user_id = $user->id;
        $university->university_code= $request->code;
        $university->name= $request->name;
        $university->address= $request->address;
        $university->contact= $request->contact;
        $university->email= $request->email;
        $university->university_type= $request->university_type;
        $university->grade= $request->grade;
        $university->save();
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return University::find($id);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        
    }
}
