<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BonusCard
 * @package App
 */
class BonusCard extends Model
{
    /**
     * @inheritdoc
     */
    protected $dates = ['expired_at'];

    protected $fillable = ['series', 'number'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchases()
    {
        return $this->hasMany(Purchase::class)->orderBy('created_at', 'desc');
    }

    /**
     * @return boolean
     */
    public function isExpired()
    {
        return $this->expired_at->gt(Carbon::now());
    }

}
