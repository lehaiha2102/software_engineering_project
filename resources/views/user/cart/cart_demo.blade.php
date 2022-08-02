@if (Session::has("Cart") != null)
    <div class="top-cart-items">
        @foreach (Session::get("Cart")->products as $item)
            <div class="top-cart-item">
                <div class="top-cart-item-image">
                    <img src="{{ $item['productInfo']->ProductImage }}" alt="Ảnh minh họa sản phẩm">
                </div>
                <div class="top-cart-item-desc">
                    <div class="top-cart-item-desc-title">
                        {{ $item['productInfo']->ProductName }}
                        <span class="top-cart-item-price d-block">
                            @if ($item['productInfo']->ProductPromotionPrice == 0)
                                <span class="amount">
                                    {{ number_format($item['productInfo']->ProductPrice) }}₫
                                </span>
                            @else
                                <span class="amount">
                                    {{ number_format($item['productInfo']->ProductPromotionPrice) }}₫
                                </span>
                            @endif
                        </span>

                    </div>
                    <div class="top-cart-item-quantity fw-semibold"> x {{ $item['quantity'] }}
                    </div>
                    &nbsp
                    <div class="top-cart-item-delelte"><i class="icon-trash2" data-id="{{$item['productInfo']->id}}"></i></div>
                </div>
            </div>
        @endforeach
    </div>
    <div>
        <span class="top-checkout-price fw-semibold text-dark">Tổng tiền: {{ Number_format(Session::get("Cart")->totalPrice) }}₫</span>
    </div>
@endif
