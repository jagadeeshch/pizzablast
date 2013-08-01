// JavaScript Document

$(document).ready(function()
{
	$(vegetables).hide();
	
	$("h2").click(function()
	{
		$(this).next().slideToggle(200);
	});
	
});