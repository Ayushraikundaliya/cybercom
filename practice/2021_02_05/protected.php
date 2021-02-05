<?php

class BankAccount{
	protected $balance = 50;

	public function displayBalance()
	{
		return $this->balance;
	}

	public function withdraw($amount)
	{
		if($this->balance < $amount)
		{
			echo "You don't have a suffiecient Balance.<br>";
		}
		else
		{
			$this->balance = $this->balance - $amount;
		}
	}
}

$bank = new BankAccount;
echo $bank->balance;			//You can't access protected variable outside class.
$bank->withdraw(40);
echo $bank->displayBalance()."<br>";
$bank->withdraw(30);
echo $bank->displayBalance();

?>