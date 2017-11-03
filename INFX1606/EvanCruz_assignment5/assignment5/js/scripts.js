/*------------------------TASK 1-----------------------------------------------------------*/

//Makes it so that box 1 that has a listener to change the color to pink 
var color1 = document.querySelector('#t1_color_one');
var color1Change = function() 
{
	document.querySelector('#task1').style.background = 'hotpink'	
};

color1.addEventListener('mouseover', color1Change);

//adds an event listener to make the background white again when no longer hovered
color1.addEventListener('mouseout', function()
{
	document.querySelector('#task1').style.background = 'white';
});


//Makes it so that box 1 that has a listener to change the color to light green
var color2 = document.querySelector('#t1_color_two');
var color2Change = function() 
{
	document.querySelector('#task1').style.background = 'lightgreen'
		
};

color2.addEventListener('mouseover', color2Change);

//adds an event listener to make the background white again when no longer hovered
color2.addEventListener('mouseout', function() 
{
	document.querySelector('#task1').style.background = 'white';
});


//Makes it so that box 3 that has a listener to change the color to a mix of violet and red
var color3 = document.querySelector('#t1_color_three');
var color3Change = function() 
{
	document.querySelector('#task1').style.background = 'palevioletred'	
};

color3.addEventListener('mouseover', color3Change);

//adds an event listener to make the background white again when no longer hovered
color3.addEventListener('mouseout', function() {

	document.querySelector('#task1').style.background = 'white';

});
/*------------------------TASK 2-----------------------------------------------------------*/

//selects the button
var move_pick = document.querySelector('#task2control');

//adds a counter to keep track of where the chrome image is
var position_count=0;
var position_loop= function()
{
	//if the position counter is 0 then the image is at the original start point
	//this code changes it to be fixed to the bottom left
	if(position_count===0)
	{
		document.querySelector('#chrome_browser').style.position = 'fixed';
		document.querySelector('#chrome_browser').style.bottom = 0;
		document.querySelector('#chrome_browser').style.left = 0;
		position_count=1;
	}
	//else the position of the chrome image is at the bottom left and this code changes the position to be static
	//thus putting it back at the original start point
	else
	{
		document.querySelector('#chrome_browser').style.position = 'static';
		position_count=0;
	}
}
move_pick.addEventListener('click', position_loop);

/*------------------------TASK 3-----------------------------------------------------------*/
//selects the drop down box
var opacity_picker = document.querySelector('#task3control');

//The function that takes the integer value in the drop box and then gets the opacity value by dividing the percentage by 100 (ie 90% == .9)
var opacity_calc=function()
{
	var opa=parseInt(this.value);
	document.querySelector('#tardis').style.opacity = opa/100;
}

//adds the event listener for when the drop box value is changed
opacity_picker.addEventListener('change', opacity_calc); 

/*------------------------TASK 4-----------------------------------------------------------*/	

//selects the text box
var textBox = document.querySelector('#task4control');

//adds an event listener that waits for keys to be pushed and released and outputs the text in a separate <p> instantly
textBox.addEventListener('keyup', function() {
	document.querySelector('#task4_output').textContent=this.value;
});

//adds a blur listener so when focus is lost on the text box the data input is logged and then both the text box and paragraph values are deleted 
textBox.addEventListener('blur', function() {
	console.log(document.querySelector('#task4_output').textContent);
	document.querySelector('#task4_output').textContent='';
	document.querySelector('#task4control').value='';
});

/*------------------------TASK 5-----------------------------------------------------------*/

window.onload = function()
{
	//creates a date object
	var currTime=new Date();
	//selects the id current time
	var timeSelect = document.querySelector('#currentTime');
	var trueMinute = currTime.getMinutes();
	//if statement that adds a 0 if the minutes are less than 10 
	if(trueMinute <10)
	{
		trueMinute = '0'+trueMinute;
	}
	//sets the content to the current hours, minutes and seconds 
	timeSelect.textContent=currTime.getHours() +':'+ trueMinute +':'+currTime.getSeconds();
	var breakT = document.querySelector('#breakTime');
	//if currTime is divisible by 5 it will print Break Time!
	if(currTime.getSeconds()%5===0)
	{
		breakT.textContent='Break Time!';
	}
}
