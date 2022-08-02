@extends('admin.master.index')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endsection
@section('title-icon')
@endsection
@section('title')
    QUẢN LÝ SẢN PHẨM
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">THÊM MỚI SẢN PHẨM</h5>
                    @if (count($errors) > 0)
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form class="" method="POST" action="{{ route('addproduct') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label class="">Tên sản phẩm</label>
                                    <input name="ProductName" placeholder="Nhập tên sản phẩm" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label class="">Đơn vị tính</label>
                                    <input name="ProductUnit" placeholder="Nhập đơn vị tính" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="">Tình trạng</label>
                                <select name="ProductCondition" id="exampleSelect" class="form-control">
                                    <option value="0">Hết hàng</option>
                                    <option value="1">Còn hàng</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="exampleSelect" class="">Danh mục sản phẩm</label>
                                    <select name="CategoryId" id="exampleSelect" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->CategoryName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label class="">Giá nhập</label>
                                    <input name="ProductPurchasePrice" placeholder="Nhập giá mua" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label class="">Giá bán</label>
                                    <input name="ProductPrice" placeholder="Nhập giá bán" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label class="">Giá khuyến mãi</label>
                                    <input name="ProductPromotionPrice" placeholder="Nhập giá khuyến mãi"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder"
                                            class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                    <input name="ProductImage" id="thumbnail" class="form-control" type="text"
                                        name="filepath">
                                </div>
                                <img id="holder" style="margin-top:15px;max-height:100px;">
                            </div>
                        </div>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                        <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
                        <script>
                            $('#lfm').filemanager('image');
                        </script>
                        <button class="mt-1 btn btn-success" type="submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Danh sách sản phẩm</h5>
                    <table class="mb-0 table table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên sản phẩm</th>
                                <th>Đơn vị tính</th>
                                <th>Tình trạng</th>
                                <th>Danh mục</th>
                                <th>Thông tin giá</th>
                                <th>Hình ảnh</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $product->ProductName }}</td>
                                    <td>{{ $product->ProductUnit }}</td>
                                    <td>{{ $product->ProductCondition == 0 ? 'Hết hàng' : 'Còn hàng' }}</td>
                                    <td>{{ $product->CategoryId }}</td>
                                    <td>
                                        <p>
                                            <span class="font-weight-bold">Giá nhập: </span>
                                            <span
                                                class="text-secondary">{{ number_format($product->ProductPurchasePrice) }}₫</span>
                                        </p>

                                        <span class="font-weight-bold">Giá bán: </span>
                                        <span class="text-success">{{ number_format($product->ProductPrice) }}₫</span></p>

                                        <span class="font-weight-bold">Giá khuyến mãi: </span>
                                        <span
                                            class="text-danger">{{ number_format($product->ProductPromotionPrice) }}₫</span>
                                        </p>
                                    </td>
                                    <td><img src="{{ $product->ProductImage }}" alt="Ảnh mô tả sản phẩm"
                                            style="width:200px; height:130px;"></td>
                                    <td style="display: flex;">
                                        <a type="button" class="btn btn-warning"
                                            href="/admin/san-pham/edit/{{ $product->ProductSlug }}">Edit</a>
                                        &nbsp
                                        <form method="POST" action="/admin/san-pham/delete/{{ $product->ProductSlug }}"
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
                    {{ $products->links() }}
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
