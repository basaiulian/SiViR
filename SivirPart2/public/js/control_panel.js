var promoteButton = document.getElementById('promoteBtn');

var deleteButton = document.getElementById('deleteBtn');

var demoteButton = document.getElementById('demoteBtn');

var usernameInput = document.getElementById('username_input');

promoteButton.addEventListener('click', promoteUser);

deleteButton.addEventListener('click', deleteUser);

demoteButton.addEventListener('click', demoteUser);

function promoteUser() {

    let usernameValue = usernameInput.value;

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	  if (this.readyState == 4 && this.status == 200) {
		console.log("User promoted");
	  } else {
		console.log("Promoting user...");
	  }
	};
	xhttp.open("POST", "api/user.php?", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("action=promoteUser&username="+usernameValue);
  }

function demoteUser() {

    let usernameValue = usernameInput.value;

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	  if (this.readyState == 4 && this.status == 200) {
		console.log("User demoted");
	  } else {
		console.log("Demoting user...");
	  }
	};
	xhttp.open("POST", "api/user.php?", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("action=demoteUser&username="+usernameValue);
  }

  
function deleteUser() {

    let usernameValue = usernameInput.value;

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	  if (this.readyState == 4 && this.status == 200) {
		console.log("User deleted");
	  } else {
		console.log("Deleting user...");
	  }
	};
	xhttp.open("POST", "api/user.php?", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("action=deleteUser&username="+usernameValue);
  }