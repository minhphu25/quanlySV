@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-warning text-dark">
        <h4 class="mb-0">Sửa Đồ Án</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('theses.update', $thesi->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label>Tên Đề tài</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $thesi->title) }}" required>
            </div>
            
            <div class="mb-3">
                <label>Sinh viên thực hiện</label>
                <select name="student_id" class="form-select" required>
                    <option value="">-- Chọn Sinh viên --</option>
                    @foreach($students as $sv)
                        <option value="{{ $sv->id }}" {{ old('student_id', $thesi->student_id) == $sv->id ? 'selected' : '' }}>
                            {{ $sv->student_number }} - {{ $sv->first_name }} {{ $sv->last_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Chương trình</label>
                    <input type="text" name="program" class="form-control" value="{{ old('program', $thesi->program) }}" required>
                </div>
                <div class="col-md-6">
                    <label>Giảng viên HD</label>
                    <input type="text" name="supervisor" class="form-control" value="{{ old('supervisor', $thesi->supervisor) }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label>Tóm tắt (Abstract)</label>
                <textarea name="abstract" class="form-control" rows="3" required>{{ old('abstract', $thesi->abstract) }}</textarea>
            </div>

            <button type="submit" class="btn btn-warning">Lưu thay đổi</button>
            <a href="{{ route('theses.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>
@endsection