# Rapidez Customer Pricing

This package adds Rapidez support for the justbetter/magento2-customer-pricing magento extension. This package will not work without it.

## Installation

```
composer require rapidez/customer-pricing
```

## Usage

This adds to the Product model:
- A `customerPricing` relation that retrieves all customer prices and tiers for the given product
- The `customerPrice(int $customerId, int $quantity = 1)` function which returns a customer price at the given tier, or null when none is found.
- The `customerTierPrices(int $customerId)` function which returns all of the tier prices for a given customer (if any).

## License

GNU General Public License v3. Please see [License File](LICENSE) for more information.
