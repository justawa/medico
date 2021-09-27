<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Package;



class PackageController extends Controller
{
    public function index()
    {
        $Packages = Package::all();
        $subjects = Subject::where('active', 1)->get();
        return view('package.show', compact('Packages','subjects'));
    }

    public function store(Request $request, Question $question, Subject $subject)
    {    
        $Packages = new Package;
        $Packages->name = $request->name;
        $Packages->type = $request->type;
        $Packages->mock = $request->mock;
        $Packages->preparation = $request->preparation;
        $Packages->duration = $request->duration;
        $Packages->price = $request->price;
        $Packages->courseid = $request->course;
        $Packages->subjectid = $request->subject;



        $Packages->save();
       
       
        return redirect()->back()->with('success', 'Package Added Successfully.');
    }


    public function create()
    {   
        $Packages= Package::all();
        $courses = Course::where('active', 1)->get();
        $subjects = Subject::where('active', 1)->get();
       return view('package.create',compact('Packages','courses','subjects'))->with('package',$Packages);
    
    }

    public function edit($id)
    {
        $courses = Course::where('active', 1)->get();
        $Packages= Package::find($id);
        return view('package.edit',compact('Packages','courses'))->with('package',$Packages);
    }
    public function list()
    {
        return Package::all();
    }
   

    public function update(Request $request, Package $package , $id)
    {   
        $Packages= Package::find($id);
        $Packages->name = $request->name;
        $Packages->type = $request->type;
        $Packages->mock = $request->mock;
        $Packages->preparation = $request->preparation;
        $Packages->duration = $request->duration;
        $Packages->price = $request->price;
        $Packages->courseid = $request->course;
        $Packages->subjectid = $request->subject;



        $Packages->update();
       
       
        return redirect()->back()->with('success', 'Package Updated Successfully.');
 
    }

    public function update_status(Request $request, $id)
    {
        $package = package::find($id);
        if($package) {
            $package->active = $request->status;
            if($package->save()) {
                return redirect()->back()->with('success', 'Status updated successfully');
            } else {
                return redirect()->back()->with('failure', 'Failed to update status');
            }
        } else {
            return redirect()->back()->with('failure', 'Some error occured');
        }
    }

}
