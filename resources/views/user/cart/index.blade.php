@extends('user.master.index')
@section('content')
    <div class="content-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" id="list-cart">
                    <form action="{{ url('/checkout') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="cart-table">
                            <table class="table cart mb-5">
                                <thead>
                                    <tr>
                                        <th class="cart-product-thumbnail">&nbsp;</th>
                                        <th class="cart-product-name">Tên sản phẩm</th>
                                        <th class="cart-product-price">Giá</th>
                                        <th class="cart-product-quantity">Số lượng</th>
                                        <th class="cart-product-subtotal">Tổng tiền</th>
                                        <th class="cart-product-remove">&nbsp;</th>
                                        <th class="cart-product-remove">&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th class="cart-product-remove delete-all" style="width: 1px;"><i
                                                class="icon-trash2"></i></th>
                                        <th class="cart-product-remove update-all" style="width: 1px;"><i
                                                class="icon-save2"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (Session::has('Cart') != null)
                                        @foreach (Session::get('Cart')->products as $item)
                                            <tr class="cart_item">
                                                <td class="cart-product-thumbnail">
                                                    <img style="width: 200px; height: 110px;"
                                                        src="{{ $item['productInfo']->ProductImage }}"
                                                        alt="Pink Printed Dress">
                                                </td>

                                                <td class="cart-product-name">
                                                    {{ $item['productInfo']->ProductName }}
                                                </td>

                                                <td class="cart-product-price">
                                                    @if ($item['productInfo']->ProductPromotionPrice == 0)
                                                        <span
                                                            class="amount">{{ number_format($item['productInfo']->ProductPrice) }}₫</span>
                                                    @else
                                                        <span
                                                            class="amount">{{ number_format($item['productInfo']->ProductPromotionPrice) }}₫</span>
                                                    @endif

                                                </td>

                                                <td class="cart-product-quantity">
                                                    <div class="quantity">
                                                        <input type="button" value="-" class="minus">
                                                        <input type="text" data-id="{{ $item['productInfo']->id }}"
                                                            id="quantity-item-{{ $item['productInfo']->id }}"
                                                            name="quantity" value="{{ $item['quantity'] }}"
                                                            class="qty" />
                                                        <input type="button" value="+" class="plus">
                                                    </div>
                                                </td>

                                                <td class="cart-product-subtotal">
                                                    <span class="amount">{{ number_format($item['Price']) }}₫</span>
                                                </td>
                                                <td class="cart-product-remove" style="width: 1px;">
                                                    <i class="icon-trash2"
                                                        onclick="DeleteListItemCart({{ $item['productInfo']->id }});"></i>
                                                </td>
                                                <td class="cart-product-remove" style="width: 1px;">
                                                    <i class="icon-save2"
                                                        onclick="SaveListItemCart({{ $item['productInfo']->id }});"></i>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <div class="row col-mb-30">
                            <div class="col-lg-6">
                                <h4>Thông tin khách hàng</h4>
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <input type="text" name="name"
                                                class="sm-form-control" placeholder="Tên khách hàng">
                                        </div>

                                        <div class="col-6 form-group">
                                            <input type="text" class="sm-form-control" name="phone_number"
                                                 placeholder="Số điện thoại">
                                        </div>
                                        <p style="color: red; font-size: 14px">(*) Thông tin quý khách phải nhập đầy đủ</p>
                                        <textarea style="resize: none;" name="note" value="note" placeholder="Ghi chú" rows="5"></textarea>

                                        {{-- <div class="col-12 form-group">
                                    <button class="button button-3d m-0 button-black">Update Totals</button>
                                </div> --}}
                                    </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-4 offset-lg-8">
                                        <ul class="cart_item" style="text-decoration: none;list-style-type: none;">
                                            @if (Session::has('Cart') != null)
                                                <li class="text-nowrap">
                                                    Tổng tiền: <span>
                                                        {{ number_format(Session::get('Cart')->totalPrice) }}₫</span>
                                                </li>
                                                <li colspan="6">
                                                    <div class="row justify-content-between py-2 col-mb-30">
                                                        <div class="col-lg-auto pe-lg-0">
                                                            <button type="submit" class="button button-3d m-0">Xác nhận</button>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function DeleteListItemCart(id) {
            $.ajax({
                url: '/xoa-san-pham-trong-gio-hang/' + id,
                type: 'GET',
            }).done(function(response) {
                RenderListItemCart(response);
                console.log(RenderListItemCart(response));
                alertify.success('Xóa món thành công');
            });
        }

        function SaveListItemCart(id) {
            console.log(id);
            $.ajax({
                url: '/luu-san-pham-trong-gio-hang/' + id + '/' + $("#quantity-item-" + id).val(),
                type: 'GET',
            }).done(function(response) {
                RenderListItemCart(response);
                console.log(RenderListItemCart(response));
                alertify.success('Cập nhật món thành công');
            });
        }

        function RenderListItemCart(response) {
            $("#list-cart").empty();
            $("#list-cart").html(response);

            // var proQty = $('.pro-qty');
            // proQty.prepend('<input type="button" value="-" class="minus">');
            // proQty.append('<input type="button" value="+" class="plus">');
            // proQty.on('click', 'qtybtn', function(){
            //     var $button = $(this);
            //     var oldValue = $button.parent().find('input').val();
            //     if($button.hasClass('inc')){
            //         var newVal = parseFloat(oldValue) + 1;
            //     }else {
            //         if(overValue > 0){
            //             var newVal = parseFloat(oldValue) - 1;
            //         } else {
            //             newVal = 0;
            //         }
            //     }
            //     $button.parent().find('input').val(newVal);
            // });
        }

        $('.update-all').on('click', function() {
            var lists = [];
            $("table tbody tr td").each(function() {
                $(this).find("input").each(function() {
                    var element = {
                        key: $(this).data("id"),
                        value: $(this).val()
                    };
                    lists.push(element);
                });
            });
            $.ajax({
                url: '/luu-tat-ca-san-pham-trong-gio-hang',
                type: 'POST',
                data: {
                    "_token": "{{ @csrf_token() }}",
                    "data": lists
                }
            }).done(function(response) {
                location.reload();
                alertify.success('Cập nhật món thành công');
            });
        });
    </script>
@endsection
