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
                <th class="cart-product-remove delete-all" style="width: 1px;"><i class="icon-trash2"></i></th>
                <th class="cart-product-remove update-all" style="width: 1px;"><i class="icon-save2"></i></th>
            </tr>
        </thead>
        <tbody >
            @if (Session::has('Cart') != null)
                @foreach (Session::get('Cart')->products as $item)
                    <tr class="cart_item">

                        <td class="cart-product-thumbnail">
                            <img style="width: 200px; height: 110px;" src="{{ $item['productInfo']->ProductImage }}"
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
                                <input type="text" data-id="{{$item['productInfo']->id}}" id="quantity-item-{{$item['productInfo']->id}}" name="quantity" value="{{ $item['quantity'] }}"
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
                            <i onclick="SaveListItemCart({{$item['productInfo']->id}});" class="icon-save2"></i>
                        </td>
                    </tr>
                    @endforeach

            @endif
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-lg-4 offset-lg-8">
        <ul class="cart_item" style="text-decoration: none;list-style-type: none;">
            @if (Session::has('Cart') != null)
            <li class="text-nowrap">
                Tổng tiền: <span> {{ number_format(Session::get('Cart')->totalPrice) }}₫</span>
            </li>
            <li colspan="6">
                <div class="row justify-content-between py-2 col-mb-30">
                    <div class="col-lg-auto pe-lg-0">
                        <a href="#" class="button button-3d m-0">Xác nhận</a>
                    </div>
                </div>
            </li>
            @endif
        </ul>
    </div>
</div>
