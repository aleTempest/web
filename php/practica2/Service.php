<?php
class Service
{
	private int $id;
	private int $vehicle_id;
	private string $vehicle_name;
	private string $service_date;
	private string $desc;
	private float $cost;

	public function __construct(int $id, int $vehicle_id, string $vehicle_name, string $service_date, string $desc, float $cost)
	{
		$this->id = $id;
		$this->vehicle_id = $vehicle_id;
		$this->vehicle_name = $vehicle_name;
		$this->service_date = $service_date;
		$this->desc = $desc;
		$this->cost = $cost;
	}

	public function getId(): int
	{
		return $this->id;
	}

	public function getVehicleId(): int
	{
		return $this->vehicle_id;
	}

	public function getVehicleName(): string
	{
		return $this->vehicle_name;
	}

	public function getServiceDate(): string
	{
		return $this->service_date;
	}

	public function getDescription(): string
	{
		return $this->desc;
	}

	public function getCost(): float
	{
		return $this->cost;
	}
}
