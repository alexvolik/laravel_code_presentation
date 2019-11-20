<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\BonusCard;
use App\Repositories\BonusCardRepository;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class BonusCardService
{
    private $bonusCardRepository;

    public function __construct(BonusCardRepository $bonusCardRepository)
    {
        $this->bonusCardRepository = $bonusCardRepository;
    }

    public function findWithPurchases(int $id): BonusCard
    {
        return $this->bonusCardRepository->findWithPurchases($id);
    }

    public function updateStatus(int $id, bool $status): bool
    {
        return $this->bonusCardRepository->updateStatus($id, $status);
    }

    public function search(array $params): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->bonusCardRepository->search($params, config('pagination.bonus_card_per_page'));
    }

    public function create(array $data): BonusCard
    {
        $expiration = Arr::pull($data, 'expiration');

        $data['expired_at'] = Carbon::now()->addMonths($expiration);

        return $this->bonusCardRepository->create($data);
    }

    public function destroy(int $id): int
    {
        return $this->bonusCardRepository->destroy($id);
    }
}
