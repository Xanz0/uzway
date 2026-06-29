<?php 
function fahrenheit_to_celsius($given_value)
{
	$celsius=5/9*($given_value-32);
	return $celsius ;
}
//Fahrenheit to kelvin
function fahrenheit_to_kelvin($given_value)
{
	$kelvin=fahrenheit_to_celsius($given_value) + 273.15;
	return $kelvin ;
}
//Celsius to fahrenheit
function celsius_to_fahrenheit($given_value)
{
	$fahrenheit=$given_value*9/5+32;
	return $fahrenheit ;
}
//Celsius to kelvin 
function celsius_to_kelvin($given_value)
{
	$kelvin=$given_value+273.15;
	return $kelvin ;
}
//Kelvin to fahrenheit equation
function kelvin_to_fahrenheit($given_value)
{
	$fahrenheit=9/5*($given_value-273.15)+32;
	return $fahrenheit ;
}
//Kelvin to celsius equation
function kelvin_to_celsius($given_value)
{
	$celsius=$given_value-273.15;
	return $celsius ;
}
?>