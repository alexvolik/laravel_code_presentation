<?php

namespace App\Services;

use App\Models\BreadCrumb;
use Illuminate\Support\Collection;

/**
 * Class BreadCrumbs
 * @package App\Services
 */
class BreadCrumbs
{
    /**
     * @var Collection
     */
    protected $items;

    /**
     * BreadCrumbs constructor.
     */
    public function __construct()
    {
        $this->items = new Collection();
    }

    /**
     * @param $title
     * @param bool $link
     */
    public function push($title, $link = false)
    {
        $this->items->push(new BreadCrumb($title, $link));
    }

    /**
     * @return Collection
     */
    public function getItems()
    {
        return $this->items;
    }

}
