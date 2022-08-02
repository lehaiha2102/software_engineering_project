@extends('user.master.index')
@section('content')
    <div class="cart-table">
        <div class="row">
            <div class="col-md-12">
                <label for="">Kết quả tìm kiếm cho từ khóa: {{ $keyword }}</label>
            </div>
        </div>
        <table class="table cart mb-5">
            <thead>
                <tr>
                    <th class="cart-product-thumbnail">&nbsp;</th>
                    <th class="cart-product-name">Tên sản phẩm</th>
                    <th class="cart-product-price">Giá</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($search as $value )
            <tr class="cart_item">
                <td class="cart-product-thumbnail">
                    <img style="width: 200px; height: 110px;" src="{{ $value->ProductImage }}"
                        alt="Pink Printed Dress">
                </td>

                <td class="cart-product-name">
                    {{ $value->ProductName }}
                </td>

                <td class="cart-product-price">

                   Giá bán: <span class="amount">{{ number_format($value->ProductPrice) }}₫</span> <br>
                   @if($value->ProductPromotionPrice != 0)
                     Giá khuyến mãi: <span class="amount">{{ number_format($value->ProductPromotionPrice) }}₫</span>
                     @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
