<?php

namespace MicroService\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use MicroService\App\Traits\BootUuid;

class User extends Model
{
    use HasFactory;
    use BootUuid;
    use SoftDeletes;

    public const RESOURCE_KEY = 'users';

    protected $guarded = [];
    protected $table = 'users';

    protected $fillable = [
        'uuid',
        'password',
    ];

    /**
     * Profile Relationship
     * @return MorphTo
     */
    public function profile(): MorphTo
    {
        return $this->morphTo();
    }
}
