<?php
class Catalog
{
	private int $id;
	private string $desc;
	private float $cost;

	public function __construct(
		int $id,
		string $desc,
		float $cost
	) {
		$this->cost = $cost;
		$this->desc = $desc;
		$this->id = $id;
	}

	public function getCost(): float
	{
		return $this->cost;
	}

	public function getDesc(): string
	{
		return $this->desc;
	}

	public function getId(): int
	{
		return $this->id;
	}
}
