<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Purchase
 * @package App
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
