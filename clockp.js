// Analog Clock - Parameters Head Script
// You may change the parameters here to set up your clock
// refer to http://javascript.about.com/library/blclockm1.htm
// for a description of the parameters
var clocksize=100;
var colnumbers='0000FF';
var colseconds='ff0000'; // or false to hide
var colminutes='000000';
var colhours='000000';
var numstyle = 0;
var font_family = 'helvetica,arial,sans-serif';
var localZone = 1;
var mytimezone = 0;
var dst = 0;
var city = '';
var country = '';
var fix = 1;
var xpos=0;
var ypos=0;
// code to adjust for daylight saving time if applicable (localzone = 0)

// code to handle clock positioning (fix = 0)

new clock('a',clocksize, colnumbers,colseconds,colminutes, 
colhours,numstyle,font_family, localZone,mytimezone,dst,city, 
country,fix,xpos,ypos);

localZone = 0;
city = 'GMT';
new clock('b',clocksize,colnumbers,colseconds,colminutes,
colhours,numstyle,font_family,localZone,mytimezone,dst,city,
country,fix,xpos,ypos); 

                    