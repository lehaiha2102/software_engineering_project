@extends('admin.master.index')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endsection
@section('title-icon')
@endsection
@section('title')
    QUẢN LÝ DANH MỤC SẢN PHẨM
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">THÊM MỚI DANH MỤC SẢN PHẨM</h5>
                    @if (count($errors) > 0)
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form class="" method="POST" action="{{ route('categoryadd') }}">
                        @csrf
                        <div class="position-relative form-group">
                            <label class="">Tên danh mục sản phẩm</label>
                            <input name="CategoryName" placeholder="Nhập tên danh mục sản phẩm" class="form-control">
                        </div>
                        <button class="mt-1 btn btn-success" type="submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Danh sách danh mục sản phẩm</h5>
                    <table class="mb-0 table table-bordered" id="example1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên danh mục</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $category->CategoryName }}</td>
                                    <td style="display: flex;">
                                        <a type="button" class="btn btn-warning"
                                            href="/admin/danh-muc-san-pham/edit/{{ $category->CategorySlug }}">Edit</a>
                                        &nbsp
                                        <form method="POST"
                                            action="/admin/danh-muc-san-pham/delete/{{ $category->CategorySlug }}"
                                            onsubmit="return ConfirmDelete( this )">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#example1').DataTable();
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
@endsection
