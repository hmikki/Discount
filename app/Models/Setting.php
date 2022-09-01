<?php

namespace App\Models;

use App\Helpers\Functions;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property string key
 * @property string name
 * @property string name_ar
 * @property string value
 * @property string value_ar
 * @property string media
 * @property integer type
 * @method Setting find(int $id)
 */
class Setting extends Model
{
    protected $table = 'settings';
    protected $fillable = ['key', 'name', 'name_ar', 'value', 'value_ar', 'media', 'type'];

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
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getNameAr(): string
    {
        return $this->name_ar;
    }

    /**
     * @param string $name_ar
     */
    public function setNameAr(string $name_ar): void
    {
        $this->name_ar = $name_ar;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValueAr(): string
    {
        return $this->value_ar;
    }

    /**
     * @param string $value_ar
     */
    public function setValueAr(string $value_ar): void
    {
        $this->value_ar = $value_ar;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getMedia(): string
    {
        return $this->media;
    }

    /**
     * @param string $media
     */
    public function setMedia(string $media): void
    {
        $this->media = $media;
    }
    public function setMediaAttribute($value)
    {
        $this->attributes['media'] = Functions::StoreImageModel($value,'settings/media');
    }
}
