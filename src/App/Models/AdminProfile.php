<?php

namespace MicroService\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use MicroService\App\Traits\BootUuid;

class AdminProfile extends Model
{
    use HasFactory;
    use BootUuid;
    use SoftDeletes;

    protected $table = 'admin_profiles';

    protected $fillable = [
        'uuid',
        'email',
    ];
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
