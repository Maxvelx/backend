@if($part->price_2 <= 0)
    {{ceil($part->getPrice($part)['price_1']*$coef).'грн'}}
@else
    @isset($part->price_1)
        <del class="product-default-price-off">{{ceil($part->getPrice($part)['price_1']*$coef).'грн'}}</del>
    @endisset
    {{ceil($part->getPrice($part)['price_2']).'грн'}}
@endif
