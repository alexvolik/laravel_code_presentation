<?php
declare(strict_types=1);

namespace App\Services;

use App\DTO\BreadCrumbDTO;
use Illuminate\Support\Collection;

class BreadCrumbs
{
    /**
     * @var Collection
     */
    private $items;

    /**
     * BreadCrumbs constructor.
     */
    public function __construct()
    {
        $this->items = new Collection();
    }

    public function push(string $title, string $link = ''): void
    {
        $this->items->push(new BreadCrumbDTO($title, $link));
    }


    public function getItems(): Collection
    {
        return $this->items;
    }

}
