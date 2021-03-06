<?php
declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BonusCard
 *
 * @property int $id
 * @property string $series
 * @property int $number
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon $expired_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Purchase[] $purchases
 * @property-read int|null $purchases_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BonusCard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BonusCard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BonusCard query()
 * @mixin \Eloquent
 */
class BonusCard extends Model
{
    /**
     * @inheritdoc
     */
    protected $dates = ['expired_at'];

    protected $fillable = ['series', 'number'];

    public function purchases(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Purchase::class)->orderBy('created_at', 'desc');
    }

    public function isExpired(): bool
    {
        return $this->expired_at->gt(Carbon::now());
    }

}
