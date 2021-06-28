<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubjectRequest;

use App\Models\Course;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subject.index', compact('subjects'));
    }

    public function create()
    {   
        return $this->edit(new Subject());
    }

    public function edit(Subject $subject)
    {
        $courses = Course::where('active', 1)->get();
        return view('subject.create', compact('courses'))->withSubject($subject);
    }

    public function store(SubjectRequest $request) 
    {
        return $this->update($request, new Subject());
    }

    public function update(SubjectRequest $request, Subject $subject)
    {
        $subject->name = $request->name;
        $subject->slug = $request->name;
        $subject->summary = $request->summary;
        $subject->course_id = $request->course;
        
        if($subject->save()) {
            return redirect()->back()->with('success', 'Subject saved successfully');
        } else {
            return redirect()->back()->with('failure', 'Failed to save subject');
        }
    }

    public function update_status(Request $request, $id)
    {
        $subject = Subject::find($id);
        if($subject) {
            $subject->active = $request->status;
            if($subject->save()) {
                return redirect()->back()->with('success', 'Status updated successfully');
            } else {
                return redirect()->back()->with('failure', 'Failed to update status');
            }
        } else {
            return redirect()->back()->with('failure', 'Some error occured');
        }
    }
}
