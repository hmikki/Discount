<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer id
 * @property mixed user_id
 * @property mixed food_id
 */
class Favourite extends Model
{
    protected $table = 'favourites';
    protected $fillable = ['user_id','food_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class);
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
    public function getFoodId()
    {
        return $this->food_id;
    }

    /**
     * @param mixed $food_id
     */
    public function setFoodId($food_id): void
    {
        $this->food_id = $food_id;
    }

}
