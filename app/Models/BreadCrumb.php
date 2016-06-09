<?php

namespace App\Models;

/**
 * Class BreadCrumb
 * @package App\Services
 */
class BreadCrumb
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $link;

    /**
     * @var boolean
     */
    protected $active;

    /**
     * BreadCrumb constructor.
     * @param $title
     * @param bool $link
     * @param bool $active
     */
    public function __construct($title, $link = false, $active = false)
    {
        $this->title = $title;
        $this->link = $link;
        $this->active = $active;
    }

    /**
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

}
