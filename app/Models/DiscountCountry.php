<?php

namespace App\Models;

use App\Helpers\Functions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer id
 * @property mixed country_id
 * @property mixed discount_id
 */
class DiscountCountry extends Model
{
    protected $table = 'discounts_countries';
    protected $fillable = ['country_id','discount_id'];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getCountryId(): string
    {
        return $this->country_id;
    }

    /**
     * @param string $country_id
     */
    public function setCountryId(string $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @return string
     */
    public function getDiscountId(): string
    {
        return $this->discount_id;
    }

    /**
     * @param string $discount_id
     */
    public function setDiscountId(string $discount_id): void
    {
        $this->discount_id = $discount_id;
    }

}
