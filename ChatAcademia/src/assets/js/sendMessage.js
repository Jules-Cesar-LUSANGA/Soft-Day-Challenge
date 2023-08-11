function sendMessage(sender, receiver, message) {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById("text").innerHTML = xhr.responseText;
		}
	};
	xhr.open("GET", "src/controllers/chats/sendMessage.php?sender=" + sender + "&receiver="+receiver + "&message=" + message, true);
	xhr.send(null);
}