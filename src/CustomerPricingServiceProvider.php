<?php

namespace Rapidez\CustomerPricing;

use Illuminate\Support\ServiceProvider;
use Rapidez\Core\Models\Product;
use Rapidez\CustomerPricing\Models\CustomerPricing;

class CustomerPricingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Product::resolveRelationUsing('customerPricing', function(Product $productModel) {
            return $productModel->hasMany(CustomerPricing::class, 'product_id');
        });

        Product::macro('customerPrice', function (int $customerId, int $quantity = 1) {
            $customerPrice = $this->customerPricing()
                ->where('customer_id', $customerId)
                ->where('quantity', '<=', $quantity)
                ->orderBy('quantity', 'desc')
                ->first();

            return $customerPrice->price ?? null;
        });

        Product::macro('customerTierPrices', function (int $customerId) {
            return $this->customerPricing()
                ->where('customer_id', $customerId)
                ->orderBy('quantity')
                ->get();
        });
    }
}
