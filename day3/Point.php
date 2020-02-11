<?php

class Point
{
    /** @var int */
    protected $x;

    /** @var int */
    protected $y;

    /**
     * @param int $x
     * @param int $y
     */
    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX () {
        return $this->x;
    }

    public function getY () {
        return $this->y;
    }

    public function equals(Point $point) : bool {
        return $point->getX() === $this->getX() && $point->getY() === $this->getY();
    }
}