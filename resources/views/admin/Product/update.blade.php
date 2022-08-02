@extends('admin.master.index')
@section('title-icon')
    <i class="pe-7s-box1"></i>
@endsection
@section('title')
    QUẢN LÝ SẢN PHẨM
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="main-card card">
                    <div class="card-body">
                        <h5 class="card-title">Chỉnh sửa sản phẩm</h5>
                        @if(count($errors) >0)
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                        <form class="" method="POST" action="/admin/san-pham/update/{{ $product->ProductSlug }}">
                            @method('PATCH')
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label class="">Tên sản phẩm</label>
                                        <input name="ProductName" value="{{ $product->ProductName }}" placeholder="Nhập tên sản phẩm" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label class="">Đơn vị tính</label>
                                        <input name="ProductUnit" value="{{ $product->ProductUnit }}" placeholder="Nhập đơn vị tính" class="form-control">
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
                                        <label for="exampleSelect" class="">Danh mục</label>
                                        <select name="CategoryId" value="{{$product->CategoryId}}" id="exampleSelect" class="form-control">
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
                                        <input name="ProductPurchasePrice" value="{{ $product->ProductPurchasePrice }}" placeholder="Nhập giá mua" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label class="">Giá bán</label>
                                        <input name="ProductPrice" value="{{ $product->ProductPrice }}" placeholder="Nhập giá bán" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label class="">Giá khuyến mãi</label>
                                        <input name="ProductPromotionPrice" value="{{ $product->ProductPromotionPrice }}" placeholder="Nhập giá khuyến mãi"
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
                                        <input name="ProductImage" value="{{ $product->ProductImage }}" id="thumbnail" class="form-control" type="text"
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
                            <button class="mt-1 btn btn-warning" type="submit">Chỉnh sửa</button>
                            <a href="{{ Route('product') }}" type="button" class="btn btn-secondary">Hủy</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
