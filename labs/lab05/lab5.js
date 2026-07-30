/* Lab 5 JavaScript File 
   Place variables and functions in this file */

function validate(formObj) {
   // put your validation code here
   // it will be a series of if statements

   if (formObj.firstName.value == "") {
      alert("You must enter a first name");
      formObj.firstName.focus();
      return false;
   }
   if (formObj.lastName.value == "") {
      alert("You must enter a last name");
      formObj.lastName.focus();
      return false;
   }
   if (formObj.title.value == "") {
      alert("You must enter a title");
      formObj.title.focus();
      return false;
   }
   if (formObj.org.value == "") {
      alert("You must enter an organization");
      formObj.org.focus();
      return false;
   }
   if (formObj.pseudonym.value == "") {
      alert("You must enter a nickname");
      formObj.pseudonym.focus();
      return false;
   }
   if (formObj.comments.value.trim() == "" || formObj.comments.value == "Please enter your comments") {
      alert("You must enter comments");
      formObj.comments.focus();
      return false;
   }

   alert("Form submitted successfully!");
   return true;
}

function clearComments() {
   var comments = document.getElementById("comments");
   if (comments.value == "Please enter your comments") {
      comments.value = "";
   }
}

function resetComments() {
   var comments = document.getElementById("comments");
   if (comments.value.trim() == "") {
      comments.value = "Please enter your comments";
   }
}

function showNickname() {
   var first = document.getElementById("firstName").value.trim();
   var last = document.getElementById("lastName").value.trim();
   var nick = document.getElementById("pseudonym").value.trim();

   if (first === "" || last === "") {
      alert("Please enter both your first and last name before showing a nickname.");
      return;
   }

   if (nick === "") {
      alert("Please enter a nickname first.");
      document.getElementById("pseudonym").focus();
      return;
   }

   alert(first + " " + last + " is " + nick);
}


