
function validateForm()
{
  var fnam=/^[a-zA-Z]{3,20}$/;
    var lnam=/^[a-zA-Z]{3,20}$/;
    var pass=/^[a-zA-Z0-9]{4,20}$/;
	var idi=/^[0-9]{4,10}$/;
	  var addr=/^[a-zA-Z]{2,}$/;
	  var quan=/^[0-9]{1,}$/;
	  var gen=/^[a-zA-Z]{2,}$/;
	  var phon=/^[0-9]{10,15}$/;
	  var em=/.+@.+\.com$/;
	  var cit=/^[a-zA-Z]{3,20}$/;
	  
   if(document.f1.fname.value.search(fnam)==-1)
    {
	alert("First name sould be more than 2 character only accept character");
	 fname.style.border=" solid 2px red";
	 document.f1.fname.focus();
	 return false;
	 }
	 
   else if(document.f1.email.value.search(em)==-1)
    {
	alert("Incorrcet email format");
	 email.style.border=" solid 2px red";
	 document.f1.email.focus();
	 return false;
	 }
	 
	    else if(document.f1.password.value.search(pass)==-1)
    {
	alert("Password should be more than 4 character");
	 password.style.border=" solid 2px red";
	 document.f1.password.focus();
	 return false;
	 }
	 
	   else if(document.f1.quantity.value.search(quan)==-1)
    {
	alert("Only number and not null");
	 quantity.style.border=" solid 2px red";
	 document.f1.quantity.focus();
	 return false;
	 }	 
  else if(document.f1.lname.value.search(lnam)==-1)
    {
	alert("Last name sould be more than 2 character and only accept character");
		lname.style.border=" solid 2px red";
	 document.f1.lname.focus();
	 return false;
	 }
 
  else if(document.f1.id.value.search(idi)==-1)
    {
		alert("id should be number and between 4-10 ");
	id.style.border=" solid 2px red";
	 document.f1.id.focus();
	 return false;
	 }
	 
	
	
   else if(document.f1.country.value.search(addr)==-1)
    {
		alert("Please select your country");
		country.style.border=" solid 2px red";
	 document.f1.country.focus();
	 return false;
	 }
	    else if(document.f1.sex.value.search(gen)==-1)
    {
		alert("Please select your gender");
		sex.style.border=" solid 2px red";
	 document.f1.sex.focus();
	 return false;
	 }
	  else if(document.f1.phone.value.search(phon)==-1)
    {
	alert("Phone Number should be 10 digit and only number");
		phone.style.border=" solid 2px red";
	 document.f1.phone.focus();
	 return false;
	 }
	 	  else if(document.f1.city.value.search(cit)==-1)
    {
	alert("address should be string and morethan 2");
		city.style.border=" solid 2px red";
	 document.f1.city.focus();
	 return false;
	 }

	 else 
	{
	 return true;
		 }
	 }