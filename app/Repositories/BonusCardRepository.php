<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\BonusCard;
use Illuminate\Support\Arr;

class BonusCardRepository
{
    public function findWithPurchases(int $id): BonusCard
    {
        return BonusCard::query()->where('bonus_cards.id', $id)
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


    public function create(array $params): BonusCard
    {
        return BonusCard::create($params);
    }

    public function destroy(int $id): int
    {
        return BonusCard::destroy($id);
    }

    public function search(array $params, int $perPage): \Illuminate\Contracts\Pagination\LengthAwarePaginator
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
