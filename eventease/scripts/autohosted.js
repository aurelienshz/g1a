	document.getElementById('nonautohostedLine').style.display="none";
document.getElementById('autohosted_No').addEventListener('click', function(){
	document.getElementById('nonautohostedLine').style.display="flex";
});
document.getElementById('autohosted_Yes').addEventListener('click', function(){
	document.getElementById('nonautohostedLine').style.display="none";
});