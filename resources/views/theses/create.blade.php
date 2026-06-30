@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Thêm Khóa luận</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('theses.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Tên Đề tài (Title)</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>
        
        <div class="mb-3">
            <label>Sinh viên thực hiện</label>
            <select name="student_id" class="form-select" required>
                <option value="">-- Chọn Sinh viên --</option>
                @foreach($students as $sv)
                    <option value="{{ $sv->id }}" {{ old('student_id') == $sv->id ? 'selected' : '' }}>
                        {{ $sv->student_number }} - {{ $sv->first_name }} {{ $sv->last_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Chương trình (Program)</label>
                <input type="text" name="program" class="form-control" value="{{ old('program') }}" required>
            </div>
            <div class="col-md-6">
                <label>Giảng viên HD (Supervisor)</label>
                <input type="text" name="supervisor" class="form-control" value="{{ old('supervisor') }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Tóm tắt (Abstract)</label>
            <textarea name="abstract" class="form-control" rows="4" required>{{ old('abstract') }}</textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Ngày nộp (Submission Date)</label>
                <input type="date" name="submission_date" class="form-control" value="{{ old('submission_date') }}">
            </div>
            <div class="col-md-6">
                <label>Ngày bảo vệ (Defense Date)</label>
                <input type="date" name="defense_date" class="form-control" value="{{ old('defense_date') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-success">Lưu lại</button>
        <a href="{{ route('theses.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection