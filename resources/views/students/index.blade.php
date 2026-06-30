@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Danh sách Sinh viên</h2>
    <a href="{{ route('students.create') }}" class="btn btn-primary">Thêm Sinh Viên</a>
</div>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Mã SV</th>
            <th>Họ và Tên</th>
            <th>Email</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $sv)
        <tr>
            <td>{{ $sv->student_number }}</td>
            <td>{{ $sv->first_name }} {{ $sv->last_name }}</td>
            <td>{{ $sv->email }}</td>
            <td class="d-flex gap-2">
    <a href="{{ route('students.edit', $sv->id) }}" class="btn btn-warning btn-sm">Sửa</a>

    <form action="{{ route('students.destroy', $sv->id) }}" method="POST" onsubmit="return confirm('Bạn chắc chắn xóa?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
    </form>
</td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection