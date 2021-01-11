var mark_height = prompt('Enter mark height');
var mark_mass = prompt('Enter mark mass');

var john_height = prompt('Enter John height');
var john_mass = prompt('Enter John mass');

var mark_bmi = mark_mass / (mark_height*mark_height);

var john_bmi = john_mass / (john_height*john_height);

var compare = mark_bmi > john_bmi;

console.log("Is Mark's BMI higher than John's? " + compare);
