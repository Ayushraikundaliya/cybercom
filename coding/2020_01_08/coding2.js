var j_game1 = 89;
var j_game2 = 120;
var j_game3 = 103;

var m_game1 = 116;
var m_game2 = 94;
var m_game3 = 123;

var ma_game1 = 97;
var ma_game2 = 134;
var ma_game3 = 105;

var j_avg = (j_game1+j_game2+j_game3)/3;

var m_avg = (m_game1+m_game2+m_game3)/3;

var ma_avg = (ma_game1+ma_game2+ma_game3)/3;



if(j_avg > m_avg)
{
	console.log("John wins with average " + j_avg);
}

else if (j_avg < m_avg) 
{
	console.log("Mike wins with average " + m_avg);
}

else
{
	console.log("It's a draw");
}


if(j_avg > m_avg && j_avg > ma_avg)
{
	console.log("John wins with average " + j_avg);
}

else if (m_avg > ma_avg) 
{
	console.log("Mike wins with average " + m_avg);
}

else
{
	console.log("Mary wins with average " + ma_avg );
}
