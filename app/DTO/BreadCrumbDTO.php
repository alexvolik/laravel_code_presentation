<?php
declare(strict_types=1);

namespace App\DTO;

class BreadCrumbDTO
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $link;

    /**
     * @var boolean
     */
    private $isActive;

    public function __construct(string $title, string $link = '', bool $isActive = false)
    {
        $this->title = $title;
        $this->link = $link;
        $this->isActive = $isActive;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): bool
    {
        $this->isActive = $isActive;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }


    public function getLink(): string
    {
        return $this->link;
    }

    public function setIsLink(string $link): void
    {
        $this->link = $link;
    }

}
