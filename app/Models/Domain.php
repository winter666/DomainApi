<?php

namespace App\Models;

use App\Models\Domain\BlockedIp;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Domain
 * @package App\Models
 * @property string $name
 * @property boolean $is_blocked
 * @property Collection $blockedIps
 */
class Domain extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'is_blocked',
    ];

    public function blockedIps(): HasMany {
        return $this->hasMany(BlockedIp::class);
    }
}
