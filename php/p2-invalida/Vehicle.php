<?php
class Vehicle 
{
	private int $id;
	private string $serial_number;
	private string $brand;
	private string $subBrand;
	private string $v_type;
	private string $model;
	private string $color;
	private int		 $capacity;
	private string $year;
	private string $origin;

	/**
	 * Constructor de la clase Vehicle.
	 *
	 * @param int $id Identificador único del vehículo.
	 * @param string $serial_number Número de serie del vehículo.
	 * @param string $brand Marca del vehículo.
	 * @param string $subBrand Sub Marca del vehículo.
	 * @param string $v_type Tipo de vehículo.
	 * @param string $model Modelo del vehículo.
	 * @param string $color Color del vehículo.
	 * @param int $capacity Capacidad del vehículo.
	 * @param string $year Año de fabricación del vehículo.
	 * @param string $origin Origen del vehículo.
	 */
	public function __construct(int $id,string $serial_number, string $brand, string $subBrand, string $v_type, string $model, string $color, int $capacity, string $year, string $origin) 
	{
		$this->id = $id;
		$this->serial_number = $serial_number;
		$this->brand = $brand;
		$this->subBrand = $subBrand;
		$this->v_type = $v_type;
		$this->model = $model;
		$this->color = $color;
		$this->capacity = $capacity;
		$this->year = $year;
		$this->origin = $origin;
	}

	public function getSerialNumber(): string
	{
		return $this->serial_number;
	}

	public function getBrand(): string
	{
		return $this->brand;
	}

	public function getVType(): string
	{
		return $this->v_type;
	}

	public function getModel(): string
	{
		return $this->model;
	}

	public function getColor(): string
	{
		return $this->color;
	}

	public function getCapacity(): int
	{
		return $this->capacity;
	}

	public function getYear(): string
	{
		return $this->year;
	}

	public function getOrigin(): string
	{
		return $this->origin;
	}

	public function getId(): int
	{
		return $this->id;
	}

	public function getSubBrand(): string
	{
		return $this->subBrand;
	}
}
