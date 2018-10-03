var fade = function () {
	return {
		num_step: 0,
		ini: function (s_col, e_col, step, tim, id, fun) {
			this.num_step = 0;
			var s_col_map = [];
			var e_col_map = [];
			var gen_col = '';
			var k = 0;
			var num = (s_col.charAt(0) == '#') ? 1 : 0;
			for (var i = num; i < s_col.length; i = i + 2) {
				s_col_map[k++] = parseInt(s_col.charAt(i) + s_col.charAt(i + 1), 16);
			}
			var k = 0;
			var num = (e_col.charAt(0) == '#') ? 1 : 0;
			for (var i = num; i < e_col.length; i = i + 2) {
				e_col_map[k++] = parseInt(e_col.charAt(i) + e_col.charAt(i + 1), 16);
			}

			var d_rcol = (s_col_map[0] > e_col_map[0]) ? Math.floor(s_col_map[0] - e_col_map[0]) : Math.floor(e_col_map[0] - s_col_map[0]);
			d_rcol = (d_rcol != 0) ? Math.floor(d_rcol / step) : 0;

			var d_gcol = (s_col_map[1] > e_col_map[1]) ? Math.floor(s_col_map[1] - e_col_map[1]) : Math.floor(e_col_map[1] - s_col_map[1]);
			d_gcol = (d_gcol != 0) ? Math.floor(d_gcol / step) : 0;

			var d_bcol = (s_col_map[2] > e_col_map[2]) ? Math.floor(s_col_map[2] - e_col_map[2]) : Math.floor(e_col_map[2] - s_col_map[2]);
			d_bcol = (d_bcol != 0) ? Math.floor(d_bcol / step) : 0;

			this.exe(s_col_map, e_col_map, d_rcol, d_gcol, d_bcol, step, tim, id, fun);
		},
		exe: function (s_col_map, e_col_map, d_rcol, d_gcol, d_bcol, step, tim, id, fun) {
			var r_c = (s_col_map[0] > e_col_map[0]) ? s_col_map[0] - d_rcol : s_col_map[0] + d_rcol;
			var g_c = (s_col_map[1] > e_col_map[1]) ? s_col_map[1] - d_gcol : s_col_map[1] + d_gcol;
			var b_c = (s_col_map[2] > e_col_map[2]) ? s_col_map[2] - d_bcol : s_col_map[2] + d_bcol;
			s_col_map[0] = r_c;
			s_col_map[1] = g_c;
			s_col_map[2] = b_c;
			this.num_step++;
			document.getElementById(id).style.background = 'rgb(' + r_c + ',' + g_c + ',' + b_c + ')';
			if (this.num_step < step) {
				var th = this;
				setTimeout(function () {
					th.exe(s_col_map, e_col_map, d_rcol, d_gcol, d_bcol, step, tim, id, fun);
				}, tim);
			}
			else {
				document.getElementById(id).style.background = 'rgb(' + e_col_map[0] + ',' + e_col_map[1] + ',' + e_col_map[2] + ')';
				if (typeof fun == 'function') {
					fun();
				}
			}
		}
	}
}


var video = document.querySelector('.camera-stream'),
	image = document.querySelector('#snap'),
	start_camera = document.querySelector('#start-camera'),
	controls = document.querySelector('.controls'),
	record = document.querySelector('#take-photo'),
	delete_photo_btn = document.querySelector('#delete-photo'),
	downloadLink = document.querySelector('#download-photo'),
	error_message = document.querySelector('#error-message');

navigator.getUserMedia = (navigator.getUserMedia ||
	navigator.mozGetUserMedia ||
	navigator.msGetUserMedia ||
	navigator.webkitGetUserMedia);

var isFirefox = typeof InstallTrigger !== 'undefined';
var isChrome = !!window.chrome && !!window.chrome.webstore;

if (navigator.getUserMedia) {
	console.log('getUserMedia supported.');

	if (isChrome) {
		var constraints = {
			"audio": true,
			"video": {
				"mandatory": {"minWidth": 600, "maxWidth": 1936, "minHeight": 600, "maxHeight": 1936},
				"optional": []
			}
		};
	} else if (isFirefox) {
		var constraints = {
			audio: true,
			video: {width: {min: 600, ideal: 850, max: 1936}, height: {min: 600, ideal: 850, max: 1936}}
		};
	}
	var chunks = [];

	var onSuccess = function (stream) {
		var mediaRecorder = new MediaRecorder(stream);

		var timer = false;

		var timeoutID;

		visualize(stream);


		record.onmousedown = function () {
			timeoutID = setTimeout(function () {
				timer = true;
				var fef_block = new fade();
				fef_block.ini('#000000', '#ff0000', 25, 10, 'take-photo');
				record.innerHTML = '<i class="material-icons">videocam</i>';
			}, 2000);
			mediaRecorder.start();
			console.log(mediaRecorder.state);
			console.log("recorder started");
			// record.style.background = "red";
			record.style.color = "black";
		}

		record.onmouseup = function () {
			if (timer == true) {
				console.log('true');
				mediaRecorder.stop();
				console.log(mediaRecorder.state);
				console.log("recorder stopped");
				record.style.background = "";
				record.style.color = "";

				var blob = new Blob(chunks, {type: "video/mp4"});
				chunks = [];

				var videoURL = window.URL.createObjectURL(blob);

				downloadLink.href = videoURL;
				console.log(videoURL);

				var rand = Math.floor((Math.random() * 10000000));
				var name = "video_" + rand + ".mp4";

				downloadLink.setAttribute("download", name);
				downloadLink.setAttribute("name", name);
			} else {
				console.log('false');
				mediaRecorder.stop();
				var snap = takeSnapshot();

				// Show image.
				image.setAttribute('src', snap);
				image.classList.add("visible");

				// Enable delete and save buttons
				downloadLink.classList.remove("disabled");

				// Set the href attribute of the download button to the snap url.
				downloadLink.href = snap;
				delete_photo_btn.classList.remove("disabled");
				downloadLink.setAttribute("download", 'pic.png');
				record.classList.add("disabled");
			}
			record.style.background = "";
			record.style.color = "";
			record.innerHTML = '<i class="material-icons">camera_alt</i>';
			clearTimeout(timeoutID);
			timer = 0;
		}

		mediaRecorder.ondataavailable = function (e) {
			chunks.push(e.data);
		}
	}

	var onError = function (err) {
		console.log('The following error occured: ' + err);
	}

	navigator.getUserMedia(constraints, onSuccess, onError);
} else {
	console.log('getUserMedia not supported on your browser!');
}

function visualize(mediaStream) {
	var video = document.querySelector('video');
	video.srcObject = mediaStream;
	video.onloadedmetadata = function (e) {
		video.play();
		video.onplay = function () {
			showVideo();
		};
	};
}

function takeSnapshot() {
	// Here we're using a trick that involves a hidden canvas element.

	var hidden_canvas = document.querySelector('canvas'),
		context = hidden_canvas.getContext('2d');

	var width = video.videoWidth,
		height = video.videoHeight;

	console.log(video);

	if (width && height) {

		// Setup a canvas with the same dimensions as the video.
		hidden_canvas.width = width;
		hidden_canvas.height = height;

		// Make a copy of the current frame in the video on the canvas.
		context.drawImage(video, 0, 0, width, height);

		// Turn the canvas image into a dataURL that can be used as a src for our photo.
		return hidden_canvas.toDataURL('image/png');
	}
}

function showVideo() {
	// Display the video stream and the controls.

	hideUI();
	video.classList.add("visible");
	controls.classList.add("visible");
}

function hideUI() {
	// Helper function for clearing the app UI.

	controls.classList.remove("visible");
	start_camera.classList.remove("visible");
	video.classList.remove("visible");
	snap.classList.remove("visible");
	error_message.classList.remove("visible");
}

delete_photo_btn.addEventListener("click", function (e) {

	e.preventDefault();

	// Hide image.
	image.setAttribute('src', "");
	image.classList.remove("visible");

	// Disable delete and save buttons
	delete_photo_btn.classList.add("disabled");
	record.classList.remove("disabled");
	// download_photo_btn.classList.add("disabled");

	// Resume playback of stream.
	video.play();
});