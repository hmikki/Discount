<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer id
 * @property string title
 * @property string title_ar
 * @property string image
 * @property mixed url
 * @property mixed discount_id
 * @property mixed type
 * @property boolean is_active
 */
class Advertisement extends Model
{
    protected $table = 'advertisements';
    protected $fillable = ['title','title_ar', 'type', 'url', 'discount_id','image','is_active'];

    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class,'discount_id', 'id');
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitleAr(): string
    {
        return $this->title_ar;
    }

    /**
     * @param string $title_ar
     */
    public function setTitleAr(string $title_ar): void
    {
        $this->title_ar = $title_ar;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }
    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }
    /**
     * @return mixed
     */
    public function getDiscountId()
    {
        return $this->discount_id;
    }
    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @param mixed $discount_id
     */
    public function setDiscountId($discount_id): void
    {
        $this->discount_id = $discount_id;
    }

    /**
     * @return bool
     */
    public function isIsActive(): bool
    {
        return $this->is_active;
    }

    /**
     * @param bool $is_active
     */
    public function setIsActive(bool $is_active): void
    {
        $this->is_active = $is_active;
    }
}
