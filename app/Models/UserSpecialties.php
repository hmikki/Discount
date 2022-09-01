<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSpecialties extends Model
{
    use HasFactory;
    protected $table = 'user_specialties';
    protected $fillable = ['user_id', 'specialties_id',];

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void 
    
    {
        $this->user_id = $user_id;
    }

    /**
     * @return int
     */
    public function getSpecialtiesId(): int
    {
        return $this->specialties_id;
    }

    /**
     * @param int $specialties_id
     */
    public function setSecialtiesId(int $specialties_id): void
    {
        $this->specialties_id = $specialties_id;
    }
}
