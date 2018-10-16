function delUsr(id) {
	var fd = new FormData();
	fd.append('id', id);
	var xhr = new XMLHttpRequest();
	xhr.open("POST", '/camagru_mvc/delusr', true);
	xhr.onreadystatechange = function () {
		if (this.readyState != 4) return;
		if (this.status == 200) {
			if (this.responseText == 1) {
                location.replace((location.hash.substr(1) != '') ? location.hash.substr(1) : '/camagru_mvc/admin');
			}
			else
				alert('Error deleting user');
		}
	};
	xhr.send(fd);
}

function admUsr(id) {
	var fd = new FormData();
	fd.append('id', id);
	var xhr = new XMLHttpRequest();
	xhr.open("POST", '/camagru_mvc/getadm', true);
	xhr.onreadystatechange = function () {
		if (this.readyState != 4) return;
		if (this.status == 200) {
			if (this.responseText == 1) {
                location.replace((location.hash.substr(1) != '') ? location.hash.substr(1) : '/camagru_mvc/admin');
			}
			else
				alert('Error changing user role');
		}
	};
	xhr.send(fd);
}