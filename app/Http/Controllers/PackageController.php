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
        return view('package.show', compact('Packages'));
    }

    public function store(Request $request, Question $question, Subject $subject)
    {    
        $Packages = new Package;
        $Packages->name = $request->name;
        $Packages->type = $request->type;
        $Packages->no_of_question = $request->no_of_question;
        $Packages->price = $request->price;

        $Packages->save();
       
       
        return redirect()->back()->with('success', 'Added Successfully.');
    }


    public function create()
    {   
       return view('package.create');
    
    }

    public function edit($id)
    {
        $Packages= Package::find($id);
        return view('package.edit',compact('Packages'))->with('package',$Packages);
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
        $Packages->no_of_question = $request->no_of_question;
        $Packages->price = $request->price;

        $Packages->update();
       
       
        return redirect()->back()->with('success', 'Updated Successfully.');
 
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
