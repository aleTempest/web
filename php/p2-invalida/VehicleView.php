<?php
class VehicleView
{
	private int $id;
	private string $s_date;
	private string $desc;
	private float $cost;

	public function __construct(int $id, string $s_date, string $desc, float $cost)
	{
		$this->id = $id;
		$this->s_date = $s_date;
		$this->desc = $desc;
		$this->cost = $cost;
	}

	public function getId() : int
	{
		return $this->id;
	}

	public function getServiceDate(): string
	{
		return $this->s_date;
	}

	public function getDesc(): string
	{
		return $this->desc;
	}

	public function getCost(): float
	{
		return $this->cost;
	}
}
