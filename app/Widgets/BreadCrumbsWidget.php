<?php
declare(strict_types=1);

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Services\BreadCrumbs;
use Illuminate\View\View;

class BreadCrumbsWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    public function run(BreadCrumbs $breadCrumbs): View
    {
        return view('widgets.bread_crumbs', [
            'items' => $breadCrumbs->getItems(),
        ]);
    }
}