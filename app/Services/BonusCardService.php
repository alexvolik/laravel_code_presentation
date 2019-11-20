<?php

namespace App\Services;


use App\Models\BonusCard;
use App\Repositories\BonusCardRepository;
use Carbon\Carbon;
use Illuminate\Support\Arr;

/**
 * Class BonusCardService
 * @package App\Services
 */
class BonusCardService
{
    /**
     * @var BonusCardRepository
     */
    protected $bonusCardRepository;

    public function __construct(BonusCardRepository $bonusCardRepository)
    {
        $this->bonusCardRepository = $bonusCardRepository;
    }

    /**
     * @param $id
     * @return BonusCard
     */
    public function findWithPurchases($id)
    {
        return $this->bonusCardRepository->findWithPurchases($id);
    }

    /**
     * @param $id
     * @param $status
     * @return bool
     */
    public function updateStatus($id, $status)
    {
        return $this->bonusCardRepository->updateStatus($id, $status);
    }

    /**
     * @param $params
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function search($params)
    {
        return $this->bonusCardRepository->search($params, config('pagination.bonus_card_per_page'));
    }

    /**
     * @param $data
     * @return BonusCard
     */
    public function create($data)
    {
        $expiration = Arr::pull($data, 'expiration');

        $data['expired_at'] = Carbon::now()->addMonths($expiration);

        return $this->bonusCardRepository->create($data);
    }

    /**
     * @param $id
     * @return int
     */
    public function destroy($id)
    {
        return $this->bonusCardRepository->destroy($id);
    }
}
