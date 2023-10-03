<?php

namespace MicroService\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use MicroService\App\Traits\BootUuid;

class ClientProfile extends Model
{
    use BootUuid;

    public const RESOURCE_KEY = 'client_profiles';

    protected $guarded = [];

    /**
     * Profile Relationship
     * @return MorphOne
     */
    public function profile(): MorphOne
    {
        return $this->morphOne(User::class, 'profile');
    }

    /**
    * @var bool
    */
    public $incrementing = false;
}
