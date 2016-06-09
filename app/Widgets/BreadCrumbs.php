<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Services\BreadCrumbs as BreadCrumbsService;

/**
 * Class BreadCrumbs
 * @package App\Widgets
 */
class BreadCrumbs extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * @param BreadCrumbsService $breadCrumbs
     * @return mixed
     */
    public function run(BreadCrumbsService $breadCrumbs)
    {
        return view("widgets.bread_crumbs", [
            'items' => $breadCrumbs->getItems(),
        ]);
    }
}