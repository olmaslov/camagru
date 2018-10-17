function getlastId() {
    var last;
    document.querySelectorAll('.post').forEach(function (post) {
        last = post.id;
    });
    return last;
}

function loadPhotos() {

    var lineend = document.getElementById('end');
    var bar = lineend.parentNode.parentNode.cloneNode(true);
    var lastid = getlastId();
    if (lastid.replace('post', '') > 0) {
        var fd = new FormData();
        fd.append('lastid', lastid.replace('post', ''));
        var xhr = new XMLHttpRequest();
        xhr.open("POST", '/camagru_mvc/getpost', true);
        xhr.onreadystatechange = function () {
            if (this.readyState != 4) return;
            if (this.status == 200) {
                if (this.responseText != '') {
                    var tan = document.querySelectorAll('.toanim');
                    tan.forEach(function (rem) {
                        rem.classList.remove('toanim');
                        rem.classList.remove('animated');
                    });
                    lineend.parentNode.parentNode.removeChild(lineend.parentNode);
                    var doc = document.getElementById(lastid).parentNode.parentNode.parentNode;
                    doc.innerHTML = doc.innerHTML + this.responseText;
                    document.querySelector('.container').appendChild(bar);
                    ajaxflag = true;
                    document.querySelectorAll('.sendcomm').forEach(function (comment) {
                        comment.addEventListener('click', function () {
                            var text = document.getElementById(comment.id.replace('send', 'text'));
                            if (text.value != '') {
                                var fd = new FormData();
                                fd.append('comment', text.value);
                                fd.append('id', comment.id.replace('send', ''));
                                var xhr = new XMLHttpRequest();
                                xhr.open("POST", '/camagru_mvc/addcom', true);
                                xhr.onreadystatechange = function () {
                                    if (this.readyState != 4) return;
                                    if (this.status == 200) {
                                        if (this.responseText == '1') {
                                            text.value = '';
                                        }
                                    }
                                };
                                xhr.send(fd);
                            }
                        });
                    });
                }
            }
        };
        xhr.send(fd);
    }
}

function likePost(postid){
    if (postid != ''){
        var fd = new FormData();
        fd.append('id', postid);
        fd.append('like', true);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", '/camagru_mvc/addlike', true);
        xhr.onreadystatechange = function () {
            if (this.readyState != 4) return;
            if (this.status == 200) {
                if (this.responseText == '1') {
                    document.getElementById('likePost' + postid).innerHTML = "favorite";
                }
            }
        };
        xhr.send(fd);
    }
}

document.querySelectorAll('.sendcomm').forEach(function (comment) {
    comment.addEventListener('click', function () {
        var text = document.getElementById(comment.id.replace('send', 'text'));
        if (text.value != '') {
            var fd = new FormData();
            fd.append('comment', text.value);
            fd.append('id', comment.id.replace('send', ''));
            var xhr = new XMLHttpRequest();
            xhr.open("POST", '/camagru_mvc/addcom', true);
            xhr.onreadystatechange = function () {
                if (this.readyState != 4) return;
                if (this.status == 200) {
                    if (this.responseText == '1') {
                        text.value = '';
                    }
                }
            };
            xhr.send(fd);
        }
    });
});

