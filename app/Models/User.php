<?php

namespace App\Models;

use App\Helpers\Constant;
use App\Helpers\Functions;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;

/**
 * @property integer id
 * @property mixed name
 * @property mixed country_code
 * @property mixed email
 * @property mixed mobile
 * @property mixed image
 * @property mixed country_id
 * @property mixed device_token
 * @property mixed device_type
 * @property mixed email_verified_at
 * @property mixed mobile_verified_at
 * @property mixed app_locale
 * @property boolean is_active
 * @method User find(int $id)
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable,HasApiTokens;

    protected $fillable = ['name','email', 'country_code','mobile', 'image', 'country_id','device_token','device_type','email_verified_at','mobile_verified_at','app_locale','is_active'];

    protected $hidden = [ 'password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime','mobile_verified_at' => 'datetime',];

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('users.created_at', 'desc');
        });
        static::deleting(function($Object) {
            foreach ($Object->notifications as $notification) {
                $notification->delete();
            };
        });
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return ($this->image)?asset($this->image):null;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = Functions::StoreImageModel($image,'users/image');
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
    public function getCountryId()
    {
        return $this->country_id;
    }
    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @param int $country_id
     */
    public function setCountryId($country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     */
    public function setMobile($mobile): void
    {
        $this->mobile = $mobile;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }
/**
     * @return mixed
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * @param mixed $country_code
     */
    public function setCountryCode($country_code): void
    {
        $this->country_code = $country_code;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }


    /**
     * @return mixed
     */
    public function getDeviceToken()
    {
        return $this->device_token;
    }

    /**
     * @param mixed $device_token
     */
    public function setDeviceToken($device_token): void
    {
        $this->device_token = $device_token;
    }

    /**
     * @return mixed
     */
    public function getDeviceType()
    {
        return $this->device_type;
    }

    /**
     * @param mixed $device_type
     */
    public function setDeviceType($device_type): void
    {
        $this->device_type = $device_type;
    }

    /**
     * @return mixed
     */
    public function getEmailVerifiedAt()
    {
        return $this->email_verified_at;
    }

    /**
     * @param mixed $email_verified_at
     */
    public function setEmailVerifiedAt($email_verified_at): void
    {
        $this->email_verified_at = $email_verified_at;
    }

    /**
     * @return mixed
     */
    public function getMobileVerifiedAt()
    {
        return $this->mobile_verified_at;
    }

    /**
     * @param mixed $mobile_verified_at
     */
    public function setMobileVerifiedAt($mobile_verified_at): void
    {
        $this->mobile_verified_at = $mobile_verified_at;
    }

    /**
     * @return mixed
     */
    public function getAppLocale()
    {
        return $this->app_locale;
    }

    /**
     * @param mixed $app_locale
     */
    public function setAppLocale($app_locale): void
    {
        $this->app_locale = $app_locale;
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
