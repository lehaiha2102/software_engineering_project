@extends('admin.master.index')
@section('title-icon')
@endsection
@section('title')
    CHI TIẾT ĐƠN HÀNG
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container123  col-md-6" style="">
                            <h4></h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="col-md-4">Thông tin khách hàng</th>
                                        <th class="col-md-6"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Thông tin người đặt hàng</td>
                                        <td>{{ $customerInfo->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Ngày đặt hàng</td>
                                        <td>{{ $customerInfo->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td>Ghi chú</td>
                                        <td>{{ $customerInfo->bill_note }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <table id="myTable" class="table table-bordered table-hover dataTable" role="grid"
                            aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting col-md-1">STT</th>
                                    <th class="sorting_asc col-md-4">Tên sản phẩm</th>
                                    <th class="sorting col-md-2">Số lượng</th>
                                    <th class="sorting col-md-2">Giá tiền</th>
                            </thead>
                            <tbody>
                                @foreach ($billInfo as $key => $bill)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $bill->product_name }}</td>
                                        <td>{{ $bill->quantily }}</td>
                                        <td>{{ number_format($bill->price) }} VNĐ</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3"><b>Tổng tiền</b></td>
                                    <td colspan="1"><b class="text-red">{{ number_format($customerInfo->bill_total) }}
                                            VNĐ</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                    <form class="" method="POST" action="/admin/don-hang/{{$customerInfo->bill_id}}">
                        @method('PATCH')
                        @csrf
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <div class="form-inline">
                                <label>Trạng thái đơn hàng: </label>
                                <select name="status" class="form-control input-inline" style="width: 200px">
                                    <option value="1">Chưa xử lý</option>
                                    <option value="2">Xử lý</option>
                                </select>
                                <input type="submit" value="Xử lý" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
