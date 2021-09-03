<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;

use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('course.index', compact('courses'));
    }

    public function create()
    {
        return $this->edit(new Course());
    }

    public function edit(Course $course)
    {
        return view('course.create')->withCourse($course);
    }

    public function store(CourseRequest $request) 
    {        
        return $this->update($request, new Course());
    }

    public function update(CourseRequest $request, Course $course)
    {
        $course->name = $request->name;
        $course->slug = $request->name;
        $course->summary = $request->summary;

        if($course->save()) {
            return redirect()->back()->with('success', 'Course saved successfully');
        } else {
            return redirect()->back()->with('failure', 'Failed to save course');
        }
    }

    public function update_status(Request $request, $id)
    {
        $course = Course::find($id);
        if($course) {
            $course->active = $request->status;
            if($course->save()) {
                return redirect()->back()->with('success', 'Status updated successfully');
            } else {
                return redirect()->back()->with('failure', 'Failed to update status');
            }
        } else {
            return redirect()->back()->with('failure', 'Some error occured');
        }
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
