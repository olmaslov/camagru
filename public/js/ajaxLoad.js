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
    var t1 = setTimeout(function () {
        lineend.classList.remove('end')
    }, 1000);
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
                    clearTimeout(t1);
                    ajaxflag = true;
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
                    console.log(this.responseText);
                    if (this.responseText == '1') {
                        text.value = '';
                    }
                }
            };
            xhr.send(fd);
        }
    });
});