function fadeOut(el) {
    el.style.opacity = 1;

    (function fade() {
        if ((el.style.opacity -= .1) < 0) {
            el.style.display = "none";
        } else {
            requestAnimationFrame(fade);
        }
    })();
}

function fadeIn(el, display) {
    el.style.opacity = 0;
    el.style.display = display || "block";

    (function fade() {
        var val = parseFloat(el.style.opacity);
        if (!((val += .1) > 1)) {
            el.style.opacity = val;
            requestAnimationFrame(fade);
        }
    })();
}

function closemodal() {
    var el = document.getElementById('modal-content');
    fadeOut(el);
}

function closemodal2() {
    var el = document.getElementById('modal-content2');
    fadeOut(el);
    // Stop stream
    try {
        let stream = video.srcObject;
        let tracks = stream.getTracks();

        tracks.forEach(function (track) {
            track.stop();
        });
    }
    catch {
    }
}

function fbLoginAJAX() {
    var nw = window.open("https://www.facebook.com/v3.0/dialog/oauth?" +
        "display=popup" +
        "&client_id=661075234258974" +
        "&redirect_uri=https://localhost:8443/camagru_mvc/account/response" +
        "&scope=email" +
        "&state=fb" +
        "&response_type=token",
        'hello',
        "width=500,height=500,location=no");
    var si = setInterval(function () {
        try {
            if (nw.document.getElementById('test') != null) {
                clearInterval(si);
                nw.window.close();
                var arr = nw.window.location.hash.split('&');
                var xhr = new XMLHttpRequest();
                xhr.open("POST", '/camagru_mvc/login', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (this.readyState != 4) return;
                    if (this.status == 200) {
                        console.log(this.responseText);
                        // closemodal();
                        var json = JSON.parse(this.responseText);
                        var date = new Date(new Date().getTime() + 30 * 24 * 60 * 60 * 1000);
                        document.cookie = "hash=" + json.hash + "; path=/; expires=" + date.toUTCString();
                        document.cookie = "id=" + json.id + "; path=/; expires=" + date.toUTCString();
						location.replace(location.hash.substr(1));
                    } else {
                        console.log(this.status);
                    }
                };
                xhr.send('fb=log&' + arr[1]);
            }
        }
        catch (error) {
        }
    }, 100);
}

function glLoginAJAX() {
    var url = "https://accounts.google.com/o/oauth2/auth?" +
        "client_id=245891107304-9kdpi7gnc9b9r1711nefuksgdo5l5dk6.apps.googleusercontent.com" +
        "&response_type=id_token" +
        "&scope=email" +
        "&redirect_uri=https://localhost:8443/camagru_mvc/account/response" +
        "&state=gl";

    var nw = window.open("https://localhost:8443",
        "hello",
        "width=500,height=500");

    nw.location = url;
    var si = setInterval(function () {
        try {
            if (nw.document.getElementById('test') != null) {
                clearInterval(si);
                nw.window.close();
                var arr = nw.window.location.hash.split('&');
                var xhr = new XMLHttpRequest();
                xhr.open("POST", '/camagru_mvc/login', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (this.readyState != 4) return;
                    if (this.status == 200) {
                        var json = JSON.parse(this.responseText);
                        // closemodal();
                        var date = new Date(new Date().getTime() + 30 * 24 * 60 * 60 * 1000);
                        document.cookie = "hash=" + json.hash + "; path=/; expires=" + date.toUTCString();
                        document.cookie = "id=" + json.id + "; path=/; expires=" + date.toUTCString();
						location.replace(location.hash.substr(1));
                    } else {
                        console.log(this.status);
                    }
                };
                xhr.send('google=' + arr[1].replace('id_token=', ''));
            }
        }
        catch (error) {
        }
    }, 100);
}

function getParameterByName(name, url) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

function intraLoginAJAX() {
    var nw = window.open("https://localhost:8443",
        "hello",
        "width=500,height=500");
    var sc = new XMLHttpRequest();
    sc.open("POST", '/camagru_mvc/login', true);
    sc.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    sc.onreadystatechange = function () {
        if (this.readyState != 4) return;
        if (this.status == 200) {
            var secret = this.responseText;
            var url = "https://api.intra.42.fr/oauth/authorize?" +
                "client_id=9f8b87fd8fba4e08b51442b8a533cfa07b303949a6f9e86a99f8dcedea067d1f&" +
                "redirect_uri=https%3A%2F%2Flocalhost%3A8443%2Fcamagru_mvc%2Faccount%2Fresponse&" +
                "response_type=code&" +
                "state=intra";
            nw.location = url;
            var si = setInterval(function () {
                try {
                    if (nw.document.getElementById('test') != null) {
                        var code = getParameterByName("code", nw.window.location.href);
                        nw.window.close();
                        clearInterval(si);
                        var xhr = new XMLHttpRequest();
                        var req = "grant_type=authorization_code" +
                            "&client_id=9f8b87fd8fba4e08b51442b8a533cfa07b303949a6f9e86a99f8dcedea067d1f" +
                            "&client_secret=" + secret +
                            "&code=" + code +
                            "&redirect_uri=https%3A%2F%2Flocalhost%3A8443%2Fcamagru_mvc%2Faccount%2Fresponse";
                        xhr.open("POST", 'https://api.intra.42.fr/oauth/token', true);
                        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        xhr.onreadystatechange = function () {
                            if (this.readyState != 4) return;
                            if (this.status == 200) {
                                var xhr1 = new XMLHttpRequest();
                                xhr1.open("POST", '/camagru_mvc/login', true);
                                xhr1.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                                xhr1.onreadystatechange = function () {
                                    if (this.readyState != 4) return;
                                    if (this.status == 200) {
                                        var json = JSON.parse(this.responseText);
                                        // closemodal();
                                        var date = new Date(new Date().getTime() + 30 * 24 * 60 * 60 * 1000);
                                        document.cookie = "hash=" + json.hash + "; path=/; expires=" + date.toUTCString();
                                        document.cookie = "id=" + json.id + "; path=/; expires=" + date.toUTCString();
										location.replace(location.hash.substr(1));
                                    }
                                };
                                xhr1.send('intra=' + this.responseText);
                            } else {
                                console.log(this.status);
                            }
                        };
                        xhr.send(req);
                    }
                }
                catch (error) {
                }
            }, 100);
        }
    }
    sc.send('secret=1');
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function validateLogin(login) {
    var re = /^([\S]{0,})$/;
    return re.test(String(login).toLowerCase());
}

function validateName(name) {
    var re = /^([a-zа-яё]+|\d+)$/;
    return re.test(String(name).toLowerCase());
}


function registerSimple() {

    var pass = document.querySelector('#passReg');
    var conf = document.querySelector('#confReg');
    var login = document.querySelector('#loginReg');
    var email = document.querySelector('#emailReg');
    var fname = document.querySelector('#fnameReg');
    var lname = document.querySelector('#lnameReg');
    if (login.value != '' && email.value != '' && pass.value != '' && conf.value != '' && fname != '' && lname != '') {
        console.log(login.value, email.value, pass.value, conf.value);
        if (pass.value == conf.value) {
            if (validateEmail(email.value)) {
                if (validateLogin(login.value)) {
                    if (validateName(fname.value) && validateName(lname.value)) {
                        var xhr1 = new XMLHttpRequest();
                        var data = "register=true&login=" + login.value +
                            "&email=" + email.value +
                            "&pass=" + pass.value +
                            "&fname=" + fname.value +
                            "&lname=" + lname.value;
                        xhr1.open("POST", '/camagru_mvc/register', true);
                        xhr1.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        xhr1.onreadystatechange = function () {
                            if (this.readyState != 4) return;
                            if (this.status == 200) {
                                console.log(this.responseText);
                                var json = JSON.parse(this.responseText);
                                var date = new Date(new Date().getTime() + 30 * 24 * 60 * 60 * 1000);
								document.cookie = "hash=" + json.hash + "; path=/; expires=" + date.toUTCString();
								document.cookie = "id=" + json.id + "; path=/; expires=" + date.toUTCString();
								// closemodal();
								location.replace(location.hash.substr(1));
							}
                        };
                        xhr1.send(data);
                    }
                    else {
                        fname.style.color = "red";
                        lname.style.color = "red";
                    }
                }
                else {
                    login.style.color = "red";
                }
            }
            else {
                email.style.color = "red";
            }
        }
        else {
            pass.style.color = "red";
            conf.style.color = "red";
        }
    }
    else {

    }
}

function simpleLogin() {
    var login = document.querySelector('#logLogin');
    var pass = document.querySelector('#logPass');
    if (login.value != '' && pass.value != '') {
        // console.log(login.value);
        // console.log(pass.value);
        var xhr1 = new XMLHttpRequest();
        var data = "simple=true&login=" + login.value +
            "&pass=" + pass.value;
        xhr1.open("POST", '/camagru_mvc/login', true);
        xhr1.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr1.onreadystatechange = function () {
            if (this.readyState != 4) return;
            if (this.status == 200) {
                console.log(this.responseText);
                var json = JSON.parse(this.responseText);
                if (json.code != 1){
                    if (json.code == 2){
                        pass.style.color = "red";
                    }
                    else {
                        alert('User does not exist. Please check data');
                    }
                }
                else {
                    // console.log();
                    var date = new Date(new Date().getTime() + 30 * 24 * 60 * 60 * 1000);
					document.cookie = "hash=" + json.hash + "; path=/; expires=" + date.toUTCString();
					document.cookie = "id=" + json.id + "; path=/; expires=" + date.toUTCString();
					location.replace((location.hash.substr(1) != '') ? location.hash.substr(1) : '/camagru_mvc');
				}
            }
        };
        xhr1.send(data);
    }
    else {

    }
}