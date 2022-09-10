<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer id
 * @property mixed user_id
 * @property mixed discount_id
 */
class Favourite extends Model
{
    protected $table = 'favourites';
    protected $fillable = ['user_id','discount_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
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
    public function getDiscountId()
    {
        return $this->discount_id;
    }

    /**
     * @param mixed $discount_id
     */
    public function setDiscountId($discount_id): void
    {
        $this->discount_id = $discount_id;
    }

}
