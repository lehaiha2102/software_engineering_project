@extends('admin.master.index')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endsection
@section('title-icon')

@endsection
@section('title')
    DANH SÁCH ĐƠN HÀNG
@endsection
<!-- Main content -->
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info"> {{ Session::get('message') }}</div>
    @endif
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <div class="row">
        <div class="col-md-12">
            <table id="myTable" id="example" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                    <th class="sorting col-md-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="" >ID</th>
                    <th class="sorting_asc col-md-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">Tên người order</th>
                    <th class="sorting col-md-1 text-nowrap" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Ngày đặt hàng</th>
                    <th>Số điện thoại</th>
                    <th>Trạng thái</th>
                    <th class="sorting col-md-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Action</th>
                    <th class="sorting col-md-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Xóa</th></tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->name }}</td>
                            <td class="text-nowrap">{{ $customer->created_at }}</td>
                            <td>{{ $customer->phone_number }}</td>
                            <td>Chưa xử lý</td>
                            <td class="text-nowrap"><a type="button" class="btn btn-primary" href="{{ url('/admin/chi-tiet-don-hang')}}/{{ $customer->id }}/edit">Chi tiết</a></td>
                            <td>
                                <form action="{{ url('admincp/bill')}}/{{ $customer->id }}/" method="post" id="formDelete">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                    {{ csrf_field() }}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
                    {{ $customers->links() }}
        </div>
    </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
@endsection
