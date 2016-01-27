<?php

require_once 'Crud.php';

class Product extends Crud
{
	protected $table = 'products';
	private $name;
	private $description;
	private $value;
	private $amount;

	public function insert()
	{
		$sql = "INSERT INTO $this->table (name, description, value, amount) VALUES (:name, :description, :value, :amount)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':name', $this->name);
		$stmt->bindParam(':description', $this->description);
		$stmt->bindParam(':value', $this->value);
		$stmt->bindParam(':amount', $this->amount);

		return $stmt->execute();
	}

	public function update($id)
	{
		$sql = "UPDATE $this->table SET name = :name, description = :description, value = :value, amount = :amount WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':name', $this->name);
		$stmt->bindParam(':description', $this->description);
		$stmt->bindParam(':value', $this->value);
		$stmt->bindParam(':amount', $this->amount);
		$stmt->bindParam(':id', $id);

		return $stmt->execute();
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setDescription($description)
	{	
		$this->description = $description;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setValue($value)
	{
		$this->value = $value;
	}

	public function getValue()
	{
		return $this->value;
	}

	public function setAmount($amount)
	{
		$this->amount = $amount;
	}

	public function getAmount()
	{
		return $this->amount;
	}
}