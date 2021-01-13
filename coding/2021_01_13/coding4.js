var mark = {
	fullName: "Mark Waugh",
	mass: prompt("Enter Mark Mass"),
	height: prompt("Enter Mark height"),
	bmi: function() {
		return this.mass/(this.height * 2);
	}
};


var john = {
	fullName: "John Green",
	mass: prompt("Enter John Mass"),
	height: prompt("Enter John height"),
	bmi: function() {
		return this.mass/(this.height * 2);
	}
};


if(john.bmi == mark.bmi)
{
	console.log("Both have equal bmi");
}

else if(john.bmi > mark.bmi)
{
	console.log(john.fullName + " bmi is Higher than " + mark.fullName);
}

else
{
	console.log(mark.fullName + " bmi is Higher than " + john.fullName);	
}