<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer id
 * @property mixed user_id
 * @property mixed provider_id
 * @property mixed category_id
 * @property mixed status
 * @property mixed amount
 * @property mixed order_date
 * @property mixed order_time
 * @property mixed reject_reason
 * @property mixed cancel_reason
 * @method Order find(mixed $order_id)
 */
class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['user_id','provider_id','category_id','status','amount','order_date','order_time','reject_reason','cancel_reason'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
    public function provider(): BelongsTo
    {
        return $this->belongsTo(User::class,'provider_id', 'id');
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function order_statuses(): HasMany
    {
        return $this->hasMany(OrderStatus::class);
    }
    public function order_details(): HasMany
    {
        return $this->hasMany(OrderDetails::class);
    }
    public function order_offer(): HasMany
    {
        return $this->hasMany(OrderOffers::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('created_at', 'desc');
        });
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
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
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
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id): void
    {
        $this->category_id = $category_id;
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
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getOrderDate()
    {
        return $this->order_date;
    }

    /**
     * @param mixed $order_date
     */
    public function setOrderDate($order_date): void
    {
        $this->order_date = $order_date;
    }

    /**
     * @return mixed
     */
    public function getOrderTime()
    {
        return $this->order_time;
    }

    /**
     * @param mixed $order_time
     */
    public function setOrderTime($order_time): void
    {
        $this->order_time = $order_time;
    }
    /**
     * @return mixed
     */
    public function getRejectReason()
    {
        return $this->reject_reason;
    }

    /**
     * @param mixed $reject_reason
     */
    public function setRejectReason($reject_reason): void
    {
        $this->reject_reason = $reject_reason;
    }

    /**
     * @return mixed
     */
    public function getCancelReason()
    {
        return $this->cancel_reason;
    }

    /**
     * @param mixed $cancel_reason
     */
    public function setCancelReason($cancel_reason): void
    {
        $this->cancel_reason = $cancel_reason;
    }

}
