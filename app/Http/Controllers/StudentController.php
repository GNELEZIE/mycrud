<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('index' , compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('creat');
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
            'name' => 'required',
            'image' => 'mimes:jpg,png'
            
        ]);

        $name = $request->name;
        $image = $request->file('image');
       if ($image) {
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);

       }else {
        $imageName = 'defaut.jpg';
       }
      
        $student = new Student();
        $student->name = $name;
        $student->image = $imageName;
        $student->save();
       
        return redirect()->route('home')->with('message', 'User ajouté avec success !!!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('show' , compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('update' , compact('student'));
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
        $name = $request->name;
        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);

        $student =  Student::find($request->id);
        $student->name = $name;
        $student->image = $imageName;
        $student->save();

        return redirect()->route('home')->with('message', 'User modifié avec success !!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        unlink(public_path('images').'/'.$student->image);
        $student->delete();
        return redirect()->route('home')->with('delete','ok');
    }
}
