<?php
namespace App\Http\Controllers;

use App\Models\Thesis;
use App\Models\Student;
use Illuminate\Http\Request;

class ThesisController extends Controller
{
    public function index()
    {
        $theses = Thesis::with('student')->latest()->get();
        return view('theses.index', compact('theses'));
    }

    public function create()
    {
        $students = Student::all();
        return view('theses.create', compact('students'));
    }

public function edit(Thesis $thesis) //
    {
      
        $students = Student::all();
        return view('theses.edit', compact('thesis', 'students'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'student_id' => 'required|exists:students,id',
            'program' => 'required|string|max:255',
            'supervisor' => 'required|string|max:100',
            'abstract' => 'required|string',
            'submission_date' => 'nullable|date',
            'defense_date' => 'nullable|date',
        ]);

        Thesis::create($request->all());
        return redirect()->route('theses.index')->with('success', 'Thêm đồ án thành công!');
    }
    public function update(Request $request, Thesis $thesi)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'student_id' => 'required|exists:students,id',
            'program' => 'required|string|max:255',
            'supervisor' => 'required|string|max:100',
            'abstract' => 'required|string',
            'submission_date' => 'nullable|date',
            'defense_date' => 'nullable|date',
        ]);

        $thesi->update($request->all());
        return redirect()->route('theses.index')->with('success', 'Cập nhật Đồ án thành công!');
    }

    public function destroy(Thesis $thesis)
    {
        $thesis->delete();
        return redirect()->route('theses.index')->with('success', 'Đã xóa đồ án!');
    }
}