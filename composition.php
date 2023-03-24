<?php
abstract class PromoCode {
    /**
     * @var Order
     */
    protected $order;

    public function __construct(Order $order) {
        $this->order = $order;
    }

    abstract public function getDiscount();
}

class DiscountPercentPromoCode extends PromoCode {
    public function getDiscount() {
        // count percents from order sum
    }
}

class CouponPromoCode extends PromoCode {
    public function getDiscount() {
        // count sum according to order and the coupon
    }
}
class DiscountFixedSumPromoCode extends PromoCode {
    public function getDiscount() {
        // count sum from order
    }
}
