var x = document.getElementById("hosts").value;
var y = document.getElementById("hosts_contact").value;
if (x == y && x == ""){
	document.getElementById('nonautohostedLine').style.display="none";
}else{
	document.getElementById('nonautohostedLine').style.display="flex";
}
document.getElementById('autohosted_No').addEventListener('click', function(){
	document.getElementById('nonautohostedLine').style.display="flex";
});
document.getElementById('autohosted_Yes').addEventListener('click', function(){
	document.getElementById('nonautohostedLine').style.display="none";
});