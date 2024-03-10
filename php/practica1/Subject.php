<?php
class Subject {
    private int $id;
    private string $name;

    /**
     * @param int $id
     * @param string $name
     */
    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function __toString(): string
    {
        return $this->id . ',' . $this->id . ',' . $this->name;
    }

    public function getId(): int
    {
        return $this->id;
    }

		public function getName(): string
		{
			return $this->name;
		}

}
