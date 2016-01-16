var x = document.getElementById("hosts");
var y = document.getElementById("hosts_contact");

//Initialisation
if (y.value != "" || x.value != ""){
	document.getElementById('nonautohostedLine').style.display="flex";
	document.getElementById("autohosted_No").checked="checked";
	document.getElementById("autohosted_Yes").checked="";
}else{
	document.getElementById('nonautohostedLine').style.display="none";
	document.getElementById("autohosted_No").checked="";
	document.getElementById("autohosted_Yes").checked="checked";
}



//Sur un clic
document.getElementById('autohosted_No').addEventListener('click', function(){
	document.getElementById('nonautohostedLine').style.display="flex";
});
document.getElementById('autohosted_Yes').addEventListener('click', function(){
	document.getElementById('nonautohostedLine').style.display="none";
	x.value = "";
	y.value = "";
});