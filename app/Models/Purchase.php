<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Purchase
 *
 * @property int $id
 * @property string $name
 * @property float $amount
 * @property int $bonus_card_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\BonusCard $bonusCard
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Purchase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Purchase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Purchase query()
 * @mixin \Eloquent
 */
class Purchase extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bonusCard()
    {
        return $this->belongsTo(BonusCard::class);
    }
}
