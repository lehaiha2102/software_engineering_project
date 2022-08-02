@extends('admin.master.index')
@section('title-icon')

@endsection
@section('title')
    QUẢN LÝ DANH MỤC SẢN PHẨM
@endsection
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Chỉnh sửa danh mục sản phẩm</h5>
                @if(count($errors) >0)
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                <form class="" method="POST" action="/admin/danh-muc-san-pham/update/{{$category->CategorySlug}}">
                    @method('PATCH')
                    @csrf
                    <div class="position-relative form-group">
                        <label class="">Tên danh mục sản phẩm</label>
                        <input name="CategoryName" value="{{$category->CategoryName}}" class="form-control">
                    </div>
                    <button class="mt-1 btn btn-warning" type="submit">Chỉnh sửa</button>
                    <a href="{{ Route('category')}}" type="button" class="btn btn-secondary">Hủy</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
