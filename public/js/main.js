function installCamagru() {
	var adm_log = document.querySelector('#loginAdm');
	var adm_pass = document.querySelector('#passAdm');
	var adm_mail = document.querySelector('#emailAdm');
	var db_url = document.querySelector('#dbPath');
	var db_name = document.querySelector('#dbName');
	var db_user = document.querySelector('#dbUser');
	var db_pass = document.querySelector('#dbPass');
	var xhr1 = new XMLHttpRequest();
	var data = "install=true&std=0&path=" + db_url.value +
		"&name=" + db_name.value +
		"&user=" + db_user.value +
		"&pass=" + db_pass.value +
		"&login=" + adm_log.value +
		"&apass=" + adm_pass.value +
		"&mail=" + adm_mail.value +
		"&std=0";
	xhr1.open("POST", '/camagru_mvc/install', true);
	xhr1.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhr1.onreadystatechange = function () {
		if (this.readyState != 4) return;
		if (this.status == 200) {
			if (this.responseText == '1')
				location.replace((location.hash.substr(1) != '') ? location.hash.substr(1) : '/camagru_mvc/admin');
			else if (this.responseText == '0')
				location.replace((location.hash.substr(1) != '') ? location.hash.substr(1) : '/camagru_mvc/login');
			console.log(this.responseText);
		}
	};
	xhr1.send(data);
}