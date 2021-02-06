<?php

class BankAccount{
	public $balance = 50;

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

class SavingAccount extends BankAccount{

}

$bank = new BankAccount;
echo $bank->balance."<br>";
$bank->withdraw(40);
echo $bank->displayBalance()."<br>";
$bank->withdraw(30);
echo $bank->displayBalance()."<br>";

echo "Saving Account<br>";

$saving = new SavingAccount;
echo $saving->balance;

?>