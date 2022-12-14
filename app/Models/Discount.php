<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer id
 * @property mixed site_id
 * @property mixed country_id
 * @property mixed category_id
 * @property mixed name
 * @property mixed name_ar
 * @property mixed description
 * @property mixed description_ar
 * @property mixed image
 * @property mixed url
 * @property mixed qrcode
 * @property mixed code
 * @property mixed type
 * @property mixed value
 * @property mixed expire_date
 * @property boolean is_active
 */
class Discount extends Model
{
    protected $table = 'discounts';
    protected $fillable = ['site_id','country_id','category_id','name','name_ar','description','description_ar','image', 'url', 'qrcode','code', 'type','value', 'expire_date','is_active'];

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class,'site_id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class,'country_id');
    }
    public function countries(): HasMany
    {
        return $this->hasMany(DiscountCountry::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id','id');
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
     * @return int
     */
    public function getSiteId(): int
    {
        return $this->site_id;
    }

    /**
     * @param int $site_id
     */
    public function setSiteId(int $site_id): void
    {
        $this->site_id = $site_id;
    }

    /**
     * @return int
     */
    public function getCountryId(): int
    {
        return $this->country_id;
    }

    /**
     * @param int $country_id
     */
    public function setCountryId(int $country_id): void
    {
        $this->country_id = $country_id;
    }
    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    /**
     * @param int $category_id
     */
    public function setCategoryId(int $category_id): void
    {
        $this->category_id = $category_id;
    }


    /**
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    /**
     * @return mixed
     */
    public function getDescription(): string
    {
        return $this->description;
    }

/**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }
    /**
     * @return mixed
     */
    public function getDescriptionAr(): string
    {
        return $this->description_ar;
    }

    /**
     * @param mixed $description_ar
     */
    public function setDescriptionAr($description_ar): void
    {
        $this->description_ar = $description_ar;
    }
    /**
     * @return mixed
     */
    public function getExpireDate(): string
    {
        return $this->expire_date;
    }

    /**
     * @param mixed $expire_date
     */
    public function setExpireDate(string $expire_date): void
    {
        $this->expire_date = $expire_date;
    }


    /**
     * @return mixed
     */
    public function getNameAr(): string
    {
        return $this->name_ar;
    }

    /**
     * @param mixed $name_ar
     */
    public function setNameAr(string $name_ar): void
    {
        $this->name_ar = $name_ar;
    }

    /**
     * @return mixed
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
    /**
     * @return mixed
     */
    public function getQrcode(): string
    {
        return $this->qrcode;
    }

    /**
     * @param mixed $qrcode
     */
    public function setQrcode(string $qrcode): void
    {
        $this->qrcode = $qrcode;
    }
    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
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
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
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
