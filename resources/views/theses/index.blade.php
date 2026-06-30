@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Danh sách Đồ án / Khóa luận</h2>
    <a href="{{ route('theses.create') }}" class="btn btn-primary">Thêm Đồ Án</a>
</div>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Tên Đề Tài</th>
            <th>Sinh Viên</th>
            <th>Chương Trình</th>
            <th>Giảng Viên HD</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($theses as $thesis)
        <tr>
            <td>{{ $thesis->title }}</td>
            <td>{{ $thesis->student->first_name ?? '' }} {{ $thesis->student->last_name ?? 'Trống' }}</td>
            <td>{{ $thesis->program }}</td>
            <td>{{ $thesis->supervisor }}</td>
            <td class="d-flex gap-2">
    <a href="{{ route('theses.edit', $thesis->id) }}" class="btn btn-warning btn-sm">Sửa</a>

    <form action="{{ route('theses.destroy', $thesis->id) }}" method="POST" onsubmit="return confirm('Bạn chắc chắn xóa?');">
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