<div class="row">

	<div class="app">

		<a href="#" id="start-camera" class="visible">Touch here to start the app.</a>
		<video id="camera-stream" class="" muted></video>
		<img id="snap">

		<p id="error-message"></p>

		<div class="controls">
			<button id="delete-photo" title="Delete Photo" class="disabled"><i class="material-icons">delete</i></button>
            <button id="take-photo" title="Take Photo"><i class="material-icons">camera_alt</i></button>
            <button id="upload-photo" class="visible"><i class="material-icons">file_upload</i></button>
<!--            <a href="#" id="download-photo" download="img.png" title="Save Photo" class="visible"><i class="material-icons">file_download</i></a>-->
        </div>

        <input type="file" style="display: none" id="upload">
		<!-- Hidden canvas element. Used for taking snapshot of video. -->
		<canvas></canvas>
        <img id="tmpimg" class="hide"/>

	</div>

</div>
<div class="row">
    <div class="filter-gallery" id="fg">
        <img class="filters" src="public/img/filterSamples/1977.png" alt="_1977"/>
        <img class="filters" src="public/img/filterSamples/aden.png" alt="aden"/>
        <img class="filters" src="public/img/filterSamples/brannan.png" alt="brannan"/>
        <img class="filters" src="public/img/filterSamples/brooklyn.png" alt="brooklyn"/>
        <img class="filters" src="public/img/filterSamples/clarendon.png" alt="clarendon"/>
        <img class="filters" src="public/img/filterSamples/gingham.png" alt="gingham"/>
        <img class="filters" src="public/img/filterSamples/hudson.png" alt="hudson"/>
        <img class="filters" src="public/img/filterSamples/inkwell.png" alt="inkwell"/>
        <img class="filters" src="public/img/filterSamples/lofi.png" alt="lofi"/>
        <img class="filters" src="public/img/filterSamples/maven.png" alt="maven"/>
        <img class="filters" src="public/img/filterSamples/mayfair.png" alt="mayfair"/>
        <img class="filters" src="public/img/filterSamples/perpetua.png" alt="perpetua"/>
        <img class="filters" src="public/img/filterSamples/reyes.png" alt="reyes"/>
        <img class="filters" src="public/img/filterSamples/stinson.png" alt="stinson"/>
        <img class="filters" src="public/img/filterSamples/toaster.png" alt="toaster"/>
        <img class="filters" src="public/img/filterSamples/valencia.png" alt="valencia"/>
        <img class="filters" src="public/img/filterSamples/walden.png" alt="walden"/>
        <img class="filters" src="public/img/filterSamples/xpro2.png" alt="xpro2"/>
    </div>
</div>

<div class="row">
    <div class="col-10 textcomm">
        <textarea id="descr"></textarea>
    </div>
    <div class="col-2 pcom" id="svpic">
        <i class="material-icons sendcomm">send</i>
    </div>
</div>

<script src="/camagru_mvc/public/js/test.js"></script>
<script>
    (function() {
        function scrollHorizontally(e) {
            e = window.event || e;
            var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
            document.getElementById('fg').scrollLeft -= (delta*40); // Multiplied by 40
            e.preventDefault();
        }
        if (document.getElementById('fg').addEventListener) {
            // IE9, Chrome, Safari, Opera
            document.getElementById('fg').addEventListener("mousewheel", scrollHorizontally, false);
            // Firefox
            document.getElementById('fg').addEventListener("DOMMouseScroll", scrollHorizontally, false);
        } else {
            // IE 6/7/8
            document.getElementById('fg').attachEvent("onmousewheel", scrollHorizontally);
        }
    })();
</script>
<style>
	/*@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,700');*/
	/*@import url('https://fonts.googleapis.com/icon?family=Material+Icons+Rounded');*/

    .textcomm {
        padding: 0;
    }

    .filter-gallery{
        height:10%;
        width:100%;
        overflow-x:scroll;
        white-space: nowrap;
    }

    .filter-gallery img {
        display: inline-block;
        vertical-align: top;
        width: 25%;
        height: auto;
    }

	*{
		box-sizing: border-box;
		margin: 0;
		padding: 0;
	}

	html{
		background-color: #fff;
		font:normal 16px/1.5 sans-serif;
		color: #333;
	}

	h3{
		font: normal 32px/1.5 'Open Sans', sans-serif;
		color: #2c3e50;
		margin: 50px 0;
		text-align: center;
	}

	.app{
		width: 100%;
		position: relative;
	}

	.app #start-camera{
		display: none;
		border-radius: 3px;
		max-width: 400px;
		color: #fff;
		background-color: #448AFF;
		text-decoration: none;
		padding: 15px;
		opacity: 0.8;
		margin: 50px auto;
		text-align: center;
	}

	.app #camera-stream{
		display: none;
		width: 100%;
	}

	.app img#snap{
		/*position: absolute;*/
		top: 0;
		left: 0;
		width: 100%;
		z-index: 10;
		display: none;
	}

	.app #error-message{
		width: 100%;
		background-color: #ccc;
		color: #9b9b9b;
		font-size: 28px;
		padding: 200px 100px;
		text-align: center;
		display: none;
	}

	.app .controls{
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: 20;

		display: flex;
        align-items: flex-end;
        justify-content: space-between;
		padding: 30px;
		display: none;
	}

	.app .controls button{
        cursor: pointer;
        border: none;
		border-radius: 50%;
		color: #fff;
		background-color: #111;
		text-decoration: none;
		padding: 15px;
		line-height: 0;
		opacity: 0.7;
		outline: none;
		-webkit-tap-highlight-color: transparent;
	}

	.app .controls button:hover{
		opacity: 1;
	}

	.app .controls button.disabled{
		background-color: #555;
		opacity: 0.5;
		cursor: default;
		pointer-events: none;
	}

	.app .controls button.disabled:hover{
		opacity: 0.5;
	}

	.app .controls button i{
		font-size: 18px;
	}

	.app .controls #take-photo i{
		font-size: 32px;
	}

	.app canvas{
		display: none;
	}



	.app #camera-stream.visible,
	.app img#snap.visible,
	.app #error-message.visible
	{
		display: block;
	}

	.app .controls.visible{
		display: flex;
	}



	@media(max-width: 1000px){

		.app #start-camera.visible{
			display: block;
		}

		.app .controls a i{
			font-size: 16px;
		}

		.app .controls #take-photo i{
			font-size: 24px;
		}
	}


	@media(max-width: 600px){
		.app #error-message{
			padding: 80px 50px;
			font-size: 18px;
		}

		.app .controls button i{
			font-size: 12px;
		}

		.app .controls #take-photo i{
			font-size: 18px;
		}
	}


</style>