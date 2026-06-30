<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:students,email',
            'student_number' => 'required|string|max:20|unique:students,student_number',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Thêm sinh viên thành công!');
    }
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            // Bỏ qua check trùng lặp email/student_number của chính sinh viên đang sửa
            'email' => 'required|email|max:100|unique:students,email,' . $student->id,
            'student_number' => 'required|string|max:20|unique:students,student_number,' . $student->id,
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Cập nhật Sinh viên thành công!');
    }
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Đã xóa!');
    }
}