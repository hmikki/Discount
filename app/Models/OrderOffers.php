<?php

namespace App\Models;

use App\Helpers\Constant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property mixed id
 * @property mixed provider_id
 * @property mixed order_id
 * @property mixed price
 * @property mixed status
 * @property mixed changed_by
 */
class OrderOffers extends Model
{
    protected $table = 'orders_offers';
    protected $guarded = [''];


    public function provider(): BelongsTo
    {
        return $this->belongsTo(User::class, 'provider_id', 'id');
    }
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function order_status():HasMany
    {
        return $this->hasMany(OrderStatus::class);
    }

    public function changed_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'changed_by');
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('created_at', 'desc');
        });
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @param mixed $order_id
     */
    public function setOrderId($order_id): void
    {
        $this->order_id = $order_id;
    }

    /**
     * @return mixed
     */
    public function getProviderId()
    {
        return $this->provider_id;
    }

    /**
     * @param mixed $provider_id
     */
    public function setProviderId($provider_id): void
    {
        $this->provider_id = $provider_id;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }
    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }
    /**
     * @return mixed
     */
    public function getChangedBy()
    {
        return $this->changed_by;
    }

    /**
     * @param mixed $changed_by
     */
    public function setChangedBy($changed_by): void
    {
        $this->changed_by = $changed_by;
    }

}
