window.onload = function() {
	var send = document.getElementById("registrationButton");
	if (send) {
		send.disabled = true;
	}
};

function Valuescheck() {
	var isOk = true;
	var focus = null;

	var userName = document.getElementById("userInput");
	if (userName) {
		if (userName.value.length<5) 
        {
			isOk = false;
			userName.style.background = '#f99';
			focus = userName;
		} else 
        {
			userName.style.background = '#9f9';
		}
	}

	if (focus) 
    {
		focus.focus();
	}

	var send = document.getElementById("registrationButton");
	if (send) {
		send.disabled = !isOk;
	}

	return isOk;
}