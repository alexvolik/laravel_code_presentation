<?php

namespace App\Http\Controllers;

use App\BonusCard;
use App\Http\Requests\BonusCardUpdateStatusRequest;
use App\Repositories\BonusCardRepository;
use App\Services\BonusCardService;
use App\Services\BreadCrumbs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\BonusCardCreateRequest;

/**
 * Class BonusCardController
 * @package App\Http\Controllers
 */
class BonusCardController extends Controller
{
    /**
     * @var BonusCardService
     */
    protected $bonusCardService;

    /**
     * BonusCardController constructor.
     * @param BonusCardService $bonusCardService
     */
    public function __construct(BonusCardService $bonusCardService)
    {
        $this->bonusCardService = $bonusCardService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param BreadCrumbs $breadCrumbs
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(BreadCrumbs $breadCrumbs, Request $request)
    {
        $breadCrumbs->push('Bonus cards');

        $cards = $this->bonusCardService->search($request->all());

        return view('bonus_card.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param BreadCrumbs $breadCrumbs
     * @return \Illuminate\Http\Response
     */
    public function create(BreadCrumbs $breadCrumbs)
    {
        $breadCrumbs->push('Bonus cards', route('bonus_cards.index'));
        $breadCrumbs->push('Generate new');

        $card = new BonusCard();

        return view('bonus_card.create', compact('card'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BonusCardCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BonusCardCreateRequest $request)
    {
        $this->bonusCardService->create($request->only(['series', 'number', 'expiration']));

        return redirect(route('bonus_cards.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param  BreadCrumbs $breadCrumbs
     * @return \Illuminate\Http\Response
     */
    public function show($id, BreadCrumbs $breadCrumbs)
    {
        $breadCrumbs->push('Bonus cards', route('bonus_cards.index'));
        $breadCrumbs->push("Edit $id");

        $card = $this->bonusCardService->findWithPurchases($id);

        $firstPurchase = $card->purchases->first();

        return view('bonus_card.show', compact('card', 'purchases', 'firstPurchase'));
    }

    /**
     * Update the specified resource status in storage.
     *
     * @param  BonusCardUpdateStatusRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(BonusCardUpdateStatusRequest $request, $id)
    {
        $this->bonusCardService->updateStatus($id, $request->get('status'));

        return response()->json(['message' => 'Updated']);
    }

    /**
     * Delete the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->bonusCardService->destroy($id);

        return redirect(route('bonus_cards.index'));
    }
}
