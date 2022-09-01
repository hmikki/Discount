<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer id
 * @property mixed site_id
 * @property mixed country_id
 * @property mixed name
 * @property mixed name_ar
 * @property mixed image
 * @property mixed url
 * @property mixed qrcode
 * @property mixed type
 * @property boolean is_active
 */
class Discount extends Model
{
    protected $table = 'discounts';
    protected $fillable = ['site_id','country_id','name','name_ar','image', 'url', 'qrcode', 'type','is_active'];

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class,'site_id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class,'country_id');
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
    public function getType(): string
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
