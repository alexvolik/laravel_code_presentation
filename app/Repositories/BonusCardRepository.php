<?php

namespace App\Repositories;


use App\Models\BonusCard;
use Illuminate\Support\Arr;

class BonusCardRepository
{
    public function findWithPurchases(int $id): BonusCard
    {
        return BonusCard::where('bonus_cards.id', $id)
            ->selectRaw('bonus_cards.*, SUM(purchases.amount) as purchases_amount')
            ->leftJoin('purchases', 'purchases.bonus_card_id', '=', 'bonus_cards.id')
            ->groupBy('bonus_cards.id')
            ->with('purchases')
            ->firstOrFail();
    }

    public function updateStatus(int $id, bool $status): bool
    {
        $card = BonusCard::findOrFail($id);

        $card->status = $status;

        return $card->save();
    }

    /**
     * @param $params
     * @return BonusCard
     */
    public function create($params)
    {
        return BonusCard::create($params);
    }

    /**
     * @param $id
     * @return int
     */
    public function destroy($id)
    {
        return BonusCard::destroy($id);
    }

    /**
     * @param $params
     * @param $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function search($params, $perPage)
    {
        $cards = BonusCard::query();

        if ($series = Arr::get($params, 'series')) {
            $cards->whereSeries($series);
        }

        if ($number = Arr::get($params, 'number')) {
            $cards->whereNumber($number);
        }

        if ($createdAt = Arr::get($params, 'createdAt')) {
            $cards->whereRaw('created_at = ?', [$createdAt]);
        }

        if ($expiredAt = Arr::get($params, 'expiredAt')) {
            $cards->whereRaw('DATE(expired_at) = ?', [$expiredAt]);
        }

        if (($status = Arr::get($params, 'status')) !== null) {
            $cards->whereStatus($status);
        }

        return $cards->paginate($perPage);
    }
}
