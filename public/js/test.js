function changeSize() {
    var mod2 = document.querySelector('.modal-2');
    var m2 = 'calc(50% - ' + (mod2.clientHeight / 2) + 'px)';
    mod2.style.top = m2;
    // console.log(m2);
}

var fade = function () {
        return {
            num_step:0,
            ini:function (s_col,e_col,step,tim,id,fun) {
                this.num_step = 0;
                var s_col_map = [];
                var e_col_map = [];
                var gen_col = '';
                var k = 0;
                var num = (s_col.charAt(0)=='#') ? 1:0;
                for(var i=num;i<s_col.length;i=i+2) {
                    s_col_map[k++]=parseInt(s_col.charAt(i)+s_col.charAt(i+1),16);
                }
                var k=0;
                var num = (e_col.charAt(0)=='#') ? 1:0;
                for(var i=num;i<e_col.length;i=i+2) {
                    e_col_map[k++]=parseInt(e_col.charAt(i)+e_col.charAt(i+1),16);
                }

                var d_rcol = (s_col_map[0]>e_col_map[0]) ? Math.floor(s_col_map[0]-e_col_map[0]) : Math.floor(e_col_map[0]-s_col_map[0]);
                d_rcol = (d_rcol!=0) ? Math.floor(d_rcol/step) : 0;

                var d_gcol = (s_col_map[1]>e_col_map[1]) ? Math.floor(s_col_map[1]-e_col_map[1]) : Math.floor(e_col_map[1]-s_col_map[1]);
                d_gcol = (d_gcol!=0) ? Math.floor(d_gcol/step) : 0;

                var d_bcol = (s_col_map[2]>e_col_map[2]) ? Math.floor(s_col_map[2]-e_col_map[2]) : Math.floor(e_col_map[2]-s_col_map[2]);
                d_bcol = (d_bcol!=0) ? Math.floor(d_bcol/step) : 0;

                this.exe(s_col_map,e_col_map,d_rcol,d_gcol,d_bcol,step,tim,id,fun);
            },
            exe:function (s_col_map,e_col_map,d_rcol,d_gcol,d_bcol,step,tim,id,fun) {
                var r_c=(s_col_map[0]>e_col_map[0]) ? s_col_map[0]-d_rcol : s_col_map[0]+d_rcol;
                var g_c=(s_col_map[1]>e_col_map[1]) ? s_col_map[1]-d_gcol : s_col_map[1]+d_gcol;
                var b_c=(s_col_map[2]>e_col_map[2]) ? s_col_map[2]-d_bcol : s_col_map[2]+d_bcol;
                s_col_map[0]=r_c;
                s_col_map[1]=g_c;
                s_col_map[2]=b_c;
                this.num_step++;
                document.getElementById(id).style.background = 'rgb('+r_c+','+g_c+','+b_c+')';
                if(this.num_step<step) {
                    var th=this;
                    setTimeout(function () { th.exe(s_col_map,e_col_map,d_rcol,d_gcol,d_bcol,step,tim,id,fun); },tim);
                }
                else {
                    document.getElementById(id).style.background = 'rgb('+e_col_map[0]+','+e_col_map[1]+','+e_col_map[2]+')';
                    if(typeof fun == 'function') {
                        fun();
                    }
                }
            }
        }
    };

var video = document.querySelector('#camera-stream'),
    image = document.querySelector('#snap'),
    start_camera = document.querySelector('#start-camera'),
    controls = document.querySelector('.controls'),
    record = document.querySelector('#take-photo'),
    delete_btn = document.querySelector('#delete-photo'),
    upload_btn = document.querySelector('#upload-photo'),
    error_message = document.querySelector('#error-message'),
    upld = document.querySelector("#upload"),
    filters = document.querySelectorAll(".filters"),
    tmpimg = document.querySelector('#tmpimg'),
    savepic = document.querySelector('#svpic'),
    flag = 0,
    filter,
    vidc,
    vid,
    img,
    ready,
    blob1;

navigator.getUserMedia = (navigator.getUserMedia ||
    navigator.mozGetUserMedia ||
    navigator.msGetUserMedia ||
    navigator.webkitGetUserMedia);

var isFirefox = typeof InstallTrigger !== 'undefined';
var isChrome = !!window.chrome && !!window.chrome.webstore;

if (navigator.getUserMedia) {
    if(isChrome){
        var constraints = {"audio": true, "video": true};
    }else if(isFirefox){
        var constraints = {audio: true,video: true};
    }
    var chunks = [];

    var onSuccess = function(stream) {
        var mediaRecorder = new MediaRecorder(stream);

        var timer = false;

        var timeoutID;

        visualize(stream);

        record.onmousedown = function () {
            if (!ready) {
                timeoutID = setTimeout(function () {
                    timer = true;
                    var fef_block = new fade();
                    fef_block.ini('#000000', '#ff0000', 25, 10, 'take-photo');
                    record.innerHTML = '<i class="material-icons">videocam</i>';
                }, 2000);
                mediaRecorder.start();
                record.style.color = "black";
            }
        }

        record.onmouseup = function() {
            if (!ready) {
                if (timer == true) {
                    mediaRecorder.stop();
                    record.style.background = "";
                    record.style.color = "";

                    var blob = new Blob(chunks, {type: "video/mp4"});
                    chunks = [];

                    var videoURL = window.URL.createObjectURL(blob);

                    upload_btn.href = videoURL;

                    var rand = Math.floor((Math.random() * 10000000));
                    var name = "video_"+rand+".mp4" ;

                    blob1 = blob;

                    vid = videoURL;
                    upload_btn.classList.remove("disabled");
                    delete_btn.classList.remove("disabled");
                    // record.firstChild.innerText = 'check';
                    record.classList.add("disabled");
                    upload_btn.setAttribute( "download", name);
                    upload_btn.setAttribute( "name", name);
                } else {
                    mediaRecorder.stop();
                    filter = 'none';
                    flag = 0;
                    var snap = takeSnapshot();

                    // Show image.
                    tmpimg.src = snap;
                    image.setAttribute('src', snap);
                    image.classList.add("visible");


                    video.classList.remove("visible");
                    // record.firstChild.innerText = 'check';
                    record.classList.add("disabled");
                    // Enable delete and save buttons
                    upload_btn.classList.remove("disabled");
                    delete_btn.classList.remove("disabled");
                }
                ready = 1;
                record.style.background = "";
                record.style.color = "";
                // record.innerHTML = '<i class="material-icons">camera_alt</i>';
                clearTimeout(timeoutID);
                timer = 0;
            }
        }

        mediaRecorder.ondataavailable = function(e) {
            chunks.push(e.data);
        }
    }

    var onError = function(err) {
    }

    navigator.getUserMedia(constraints, onSuccess, onError);
} else {
}

function visualize(mediaStream) {
    var video = document.querySelector('video');
    video.srcObject = mediaStream;
    video.onloadedmetadata = function(e) {
        video.play();
        video.onplay = function() {
            showVideo();
        };
    };
}

function takeSnapshot() {
    // Here we're using a trick that involves a hidden canvas element.

    var hidden_canvas = document.querySelector('canvas'),
        context = hidden_canvas.getContext('2d');
    if (flag == 0) {
        var width = video.videoWidth,
            height = video.videoHeight;
        vidc = video;
    }
    else {
        var width = tmpimg.width,
            height = tmpimg.height;
        vidc = tmpimg;
    }

    if (width && height) {

        context.filter = null;
        context.globalCompositeOperation = null;
        // Setup a canvas with the same dimensions as the video/img
        hidden_canvas.width = width;
        hidden_canvas.height = height;


        eval(filter + "Filter(context, width, height)");
        // Turn the canvas image into a dataURL that can be used as a src for our photo.
        var nUrl = hidden_canvas.toDataURL('image/png');
        img = nUrl;
        return nUrl;
    }
}

function showVideo(){
    // Display the video stream and the controls.

    hideUI();
    video.classList.add("visible");
    controls.classList.add("visible");
    changeSize();
}

function hideUI(){
    // Helper function for clearing the app UI.

    controls.classList.remove("visible");
    start_camera.classList.remove("visible");
    video.classList.remove("visible");
    image.classList.remove("visible");
    error_message.classList.remove("visible");
}

upload_btn.addEventListener("click", function (e) {
    e.preventDefault();

    upld.click();
});

filters.forEach(function (filt) {
    filt.addEventListener('click', function (e) {
        if (image.src) {
            e.preventDefault();

            filter = this.alt;
            flag = 2;

            var snap = takeSnapshot();
            image.setAttribute('src', snap);
                    }
    });
});



upld.addEventListener("change", function (e) {
    e.preventDefault();

    if (upld.files.length > 0){
        image.setAttribute('src', window.URL.createObjectURL(upld.files[0]));
        filter = 'none';
        ready = 0;
        tmpimg.src = image.src;
        image.onload = function () {
            image.classList.add("visible");
            delete_btn.classList.remove('disabled');
            delete_btn.firstChild.innerText = 'camera_alt';
            record.classList.add('disabled');
            video.classList.remove("visible");
            flag = 1;
            if (!ready)
                takeSnapshot();
            ready = 1;
            changeSize();
        };
    }
});


delete_btn.addEventListener("click", function(e){
    e.preventDefault();

if (flag) {
    image.classList.remove("visible");
    image.removeAttribute('src');
    delete_btn.firstChild.innerText = 'delete';
    flag = 0;
}
ready = 0;
    record.firstChild.innerText = 'camera_alt';
    // Hide image.
    image.removeAttribute('src');
    image.classList.remove("visible");

    video.classList.add("visible");


    delete_btn.classList.add("disabled");
    record.classList.remove("disabled");

    // Resume playback of stream.
    video.play();
});

savepic.addEventListener("click", function (e) {
    e.preventDefault();

    if (vid){
        var reader = new FileReader();
        reader.onload = function(event) {
            var fd = new FormData();
            fd.append('type', 'video');
            fd.append('data', event.target.result);
            fd.append('descr', document.querySelector('#descr').value);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", 'https://localhost:8443/camagru_mvc/savetodb', true);
            xhr.onreadystatechange = function () {
                if (this.readyState != 4) return;
                if (this.status == 200) {
                } else {
                    // console.log(this.status);
                }
            };
            xhr.send(fd);
        }
        reader.readAsDataURL(blob1);
    } else if (!vid && img) {
        var fd = new FormData();
        fd.append('type', 'pic');
        fd.append('data', img);
        fd.append('descr', document.querySelector('#descr').value);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", 'https://localhost:8443/camagru_mvc/savetodb', true);
        xhr.onreadystatechange = function () {
            if (this.readyState != 4) return;
            if (this.status == 200) {
            } else {
                // console.log(this.status);
            }
        };
        xhr.send(fd);
    }
});