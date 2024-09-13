<?php

namespace Rapidez\CustomerPricing\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Rapidez\Core\Models\Model;
use Rapidez\Core\Models\Product;

class CustomerPricing extends Model
{
    protected $table = 'customer_pricing';

    protected $primaryKey = 'id';

    /** @return BelongsTo<Product, CustomerPricing> */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
