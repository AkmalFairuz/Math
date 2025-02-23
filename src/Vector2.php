<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
*/

declare(strict_types=1);

namespace pocketmine\math;

use function abs;
use function ceil;
use function floor;
use function round;
use function sqrt;

class Vector2{
	public function __construct(
		public float $x,
		public float $y
	){}

	public function getX() : float{
		return $this->x;
	}

	public function getY() : float{
		return $this->y;
	}

	public function getFloorX() : int{
		return (int) floor($this->x);
	}

	public function getFloorY() : int{
		return (int) floor($this->y);
	}

	public function add(float $x, float $y) : Vector2{
		return new Vector2($this->x + $x, $this->y + $y);
	}

	public function addVector(Vector2 $vector2) : Vector2{
		return $this->add($vector2->x, $vector2->y);
	}

	public function subtract(float $x, float $y) : Vector2{
		return $this->add(-$x, -$y);
	}

	public function subtractVector(Vector2 $vector2) : Vector2{
		return $this->add(-$vector2->x, -$vector2->y);
	}

	public function ceil() : Vector2{
		return new Vector2((int) ceil($this->x), (int) ceil($this->y));
	}

	public function floor() : Vector2{
		return new Vector2((int) floor($this->x), (int) floor($this->y));
	}

	public function round() : Vector2{
		return new Vector2(round($this->x), round($this->y));
	}

	public function abs() : Vector2{
		return new Vector2(abs($this->x), abs($this->y));
	}

	public function multiply(float $number) : Vector2{
		return new Vector2($this->x * $number, $this->y * $number);
	}

	public function divide(float $number) : Vector2{
		return new Vector2($this->x / $number, $this->y / $number);
	}

	public function distance(Vector2 $pos) : float{
		return sqrt($this->distanceSquared($pos));
	}

	public function distanceSquared(Vector2 $pos) : float{
		$dx = $this->x - $pos->x;
        $dy = $this->y - $pos->y;
        return ($dx * $dx) + ($dy * $dy);
	}

	public function length() : float{
		return sqrt($this->lengthSquared());
	}

	public function lengthSquared() : float{
		return $this->x * $this->x + $this->y * $this->y;
	}

	public function normalize() : Vector2{
		$len = $this->lengthSquared();
		if($len > 0){
			return $this->divide(sqrt($len));
		}

		return new Vector2(0, 0);
	}

	public function dot(Vector2 $v) : float{
		return $this->x * $v->x + $this->y * $v->y;
	}

	public function __toString(){
		return "Vector2(x=" . $this->x . ",y=" . $this->y . ")";
	}

}
