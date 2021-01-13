var amount = [];
var tips = [];

function tipCalculator(bill)
{
	if(bill <= 50)
	{
		tip = Math.floor(0.20 * bill);
		amount.push(bill+tip);
		tips.push(tip);
	}
	else if(bill > 50 && bill <=200)
	{
		tip = Math.floor(0.15 * bill);
		amount.push(bill+tip);
		tips.push(tip);
	}
	else{
		tip = Math.floor(0.10 * bill);
		amount.push(bill+tip)
		tips.push(tip);
	}
}

tipCalculator(124);
tipCalculator(48);
tipCalculator(268);

console.log(tips);
console.log(amount);