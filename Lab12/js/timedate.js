function gettheDate()
{
	current = new Date();
	theDate = "" + (current.getMonth()+ 1) + "/" + current.getDate() + "/" + (current.getYear()-100);
	document.getElementById("date").innerHTML = theDate;
}

var timerID = null;
var timerRunning = false;

function stopclock()
{
	if(timerRunning)
		clearTimeout(timerID);
	timerRunning = false;
}

function startclock()
{
	stopclock();
	gettheDate();
	showtime();
}

function showtime()
{
	var now = new Date();
	var hours = now.getHours();
	var minutes = now.getMinutes();
	var seconds = now.getSeconds();
	var timeValue = "" + ((hours >12) ? hours - 12 : hours)
	timeValue += ((minutes < 10) ? "0" : ":") + minutes
	timeValue += ((seconds < 10) ? "0" : ":") + seconds
	timeValue += (hours >= 12) ? " P.M. " : " A.M. "
	document.getElementById("zegarek").innerHTML = timeValue;
	timerID = setTimeout("showtime()", 1000);
	timerRunning = true;
}

// display current year
window.addEventListener('DOMContentLoaded', (event) => {
	document.querySelector('.yearJS').innerHTML = new Date().getFullYear();
})