@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-warning text-dark">
        <h4 class="mb-0">Sửa Sinh Viên</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Họ (First Name)</label>
                    <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $student->first_name) }}" required>
                </div>
                <div class="col-md-6">
                    <label>Tên (Last Name)</label>
                    <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $student->last_name) }}" required>
                </div>
            </div>
            <div class="mb-3">
                <label>Mã Sinh viên</label>
                <input type="text" name="student_number" class="form-control" value="{{ old('student_number', $student->student_number) }}" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $student->email) }}" required>
            </div>
            <button type="submit" class="btn btn-warning">Lưu thay đổi</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>
@endsection