<?php

namespace App\Models\Domain;

use App\Models\Domain;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class BlockListIp
 * @package App\Models\Domain
 * @property string $name
 * @property Domain $domain
 */
class BlockedIp extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function domain(): BelongsTo {
        return $this->belongsTo(Domain::class);
    }
}
