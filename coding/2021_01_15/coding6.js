var a = 0;
var b = 1;
var i,c;

console.log(a);
console.log(b);

for(i = 0;i<10;i++)
{
	c = b;
	b = a+b;
	a = c;
	console.log(b + ' ');
}