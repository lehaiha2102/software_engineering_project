@extends('user.master.index')
@section('content')
    <div class="content-wrap py-0" style="overflow: visible;">
        <div class="container">
            <div class="tabs tabs-justify" id="tab-1" id="accordion-category">
                <ul class="tab-nav clearfix border-bottom-0">
                    @foreach ($categories as $category)
                        <li><a href="#{{ $category->CategorySlug }}" data-parent="#accordion-category">{{ $category->CategoryName }}</a></li>
                    @endforeach
                </ul>
                @foreach ($categories as $category)
                    <div class="tab-container mt-4">
                        <div class="tab-content" id="{{ $category->CategorySlug }}">
                            <div class="row gutter-40">
                                @foreach ($products as $product)
                                    @if ($product->CategoryId == $category->id)
                                    <div class="col-lg-3 col-md-6">
                                        <div class="portfolio-item">
                                            <a href="javascript:" class="portfolio-image"
                                                onclick="AddCart({{ $product->id }})">
                                                <img src="{{ $product->ProductImage }}" alt="1" class="rounded"
                                                    style="width:250px; height:150px;">
                                            </a>
                                            {{-- <form method="POST" action="{{ url('cart') }}">
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <a type="submit" class="btn btn-fefault add-to-cart portfolio-image">
                                                    <img src="{{ $product->ProductImage }}" alt="1"
                                                        class="rounded" style="width:250px; height:150px;">
                                                </a>
                                            </form> --}}
                                            <div class="portfolio-desc pt-2">
                                                <h4 class="mb-1"><a href="#">{{ $product->ProductName }}</a>
                                                </h4>
                                                <div class="item-price" style="font-size: 11px;">
                                                    @if ($product->ProductPromotionPrice == 0)
                                                        <span class="font-weight-bold">Giá bán: </span> <span
                                                            class="text-success">{{ number_format($product->ProductPrice) }}
                                                            ₫</span>
                                                        <span>Đơn vị tính: {{ $product->ProductUnit }}</span>
                                                    @else
                                                        <span class="font-weight-bold">Giá bán: </span> <span
                                                            class="text-success">{{ number_format($product->ProductPrice) }}
                                                            ₫</span>

                                                        <span class="font-weight-bold">Giá khuyến mãi: </span>
                                                        <span
                                                            class="text-danger">{{ number_format($product->ProductPromotionPrice) }}
                                                            ₫</span>

                                                        <span>Đơn vị tính: {{ $product->ProductUnit }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div
        style="position: absolute; bottom: 0; left: 0; width: 100%; z-index: 3; background: url('/user/demos/restaurant/images/sketch-header.png') repeat center bottom; background-size: auto 100%; height: 40px; margin-bottom: -10px;">
    </div>
      <script language="javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
        function AddCart(id) {
            $.ajax({
                url: '/them-vao-gio-hang/' + id,
                type: 'GET',
            }).done(function(response) {
                $("#change-item-cart").empty();
                $("#change-item-cart").html(response);
                alertify.success('Chọn món thành công');
            });
        }
        $("#change-item-cart").on('click', '.icon-trash2', function(){
            $.ajax({
                url: '/xoa-san-pham/' + $(this).data('id'),
                type: 'GET',
            }).done(function(response) {
                console.log(response);
                $("#change-item-cart").empty();
                $("#change-item-cart").html(response);
                alertify.success('Xóa món thành công');
            });
        });
    </script>
@endsection
