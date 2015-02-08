




window.onload = function(){ 

if (document.getElementById("one")!=null){

document.getElementById("access").onclick = (function() {
   window.open("access_control.php","_self");});
	
document.getElementById("user").onclick = (function() {
    window.open("user.php","_self");});	
	
document.getElementById("sched").onclick = (function() {
    window.open("sched.php","_self");});
	
document.getElementById("room").onclick = (function() {
    window.open("room.php","_self");});
	
document.getElementById("set").onclick = (function() {
    window.open("settings.php","_self");});		
	
document.getElementById("intel").onclick = (function() {
    window.open("intellesense.php","_self");});	
		
		
}


else if (document.getElementById("two")!=null){
	
document.getElementById("home").onclick = (function() {
    window.open("index.php","_self");});

document.getElementById("link_pop").onclick = (function() {
    	
		var div=document.getElementById('popup');
div.style.visibility = (div.style.visibility == "hidden") ? "visible" : "hidden";
	
});
}

else if (document.getElementById("three")!=null){
	
document.getElementById("home").onclick = (function() {
    window.open("index.php","_self");});	
}	


else if (document.getElementById("four")!=null){
	
document.getElementById("home").onclick = (function() {
    window.open("index.php","_self");});	
}	

else if (document.getElementById("five")!=null){
	
document.getElementById("home").onclick = (function() {
    window.open("index.php","_self");});	
}	

else if (document.getElementById("six")!=null){
	
document.getElementById("home").onclick = (function() {
    window.open("index.php","_self");});	
}	

}


