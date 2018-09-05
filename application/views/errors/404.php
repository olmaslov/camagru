<div class="row">

    <div class="app">

        <a href="#" id="start-camera" class="visible">Touch here to start the app.</a>
        <video id="camera-stream" class="" muted></video>
        <img id="snap">

        <p id="error-message"></p>

        <div class="controls">
            <a href="#" id="delete-photo" title="Delete Photo" class="disabled"><i class="material-icons">delete</i></a>
            <div>
                <select id="filters">
                    <option>_1977</option>
                    <option>aden</option>
                    <option>brannan</option>
                    <option>brooklyn</option>
                    <option>clarendon</option>
                    <option>earlybird</option>
                    <option>gingham</option>
                    <option>hudson</option>
                    <option>inkwell</option>
                    <option>lofi</option>
                    <option>maven</option>
                    <option>mayfair</option>
                    <option>perpetua</option>
                    <option>reyes</option>
                    <option>stinson</option>
                    <option>toaster</option>
                    <option>valencia</option>
                    <option>walden</option>
                    <option>xpro2</option>
                </select>
            </div>
            <a href="#" id="take-photo" title="Take Photo"><i class="material-icons">camera_alt</i></a>
            <a href="#" id="upload-photo" class="visible"><i class="material-icons">file_upload</i></a>
            <div id="carousel" class="carousel">
                <a class="arrow prev"><i class="material-icons">navigate_before</i></a>
                <div class="gallery">
                    <ul class="images">
                        <li><img src="public/img/filterSamples/1977.png"></li>
                        <li><img src="public/img/filterSamples/aden.png"></li>
                        <li><img src="public/img/filterSamples/brannan.png"></li>
                        <li><img src="public/img/filterSamples/brooklyn.png"></li>
                    </ul>
                </div>
                <a class="arrow next"><i class="material-icons">navigate_next</i></a>
            </div>
            <a href="#" id="download-photo" download="img.png" title="Save Photo" class="visible"><i class="material-icons">file_download</i></a>
        </div>
        <input type="file" style="display: none" id="upload">
        <!-- Hidden canvas element. Used for taking snapshot of video. -->
        <canvas class="_1977"></canvas>

    </div>

</div>

<script src="/camagru_mvc/public/js/test.js"></script>
<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans:400,700');
    @import url('https://fonts.googleapis.com/icon?family=Material+Icons');

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
        position: absolute;
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

    .app .controls a{
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

    .app .controls a:hover{
        opacity: 1;
    }

    .app .controls a.disabled{
        background-color: #555;
        opacity: 0.5;
        cursor: default;
        pointer-events: none;
    }

    .app .controls a.disabled:hover{
        opacity: 0.5;
    }

    .app .controls a i{
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

        .app .controls a i{
            font-size: 12px;
        }

        .app .controls #take-photo i{
            font-size: 18px;
        }
    }

    .carousel {
        position: relative;
        width: 398px;
        padding: 10px 40px;
        border-radius: 15px;
    }

    .carousel img {
        width: 150px;
        height: 150px;
        /* по умолчанию inline, в ряде браузеров это даст лишнее пространство вокруг элементов */

        display: block;
    }

    .arrow {
        position: absolute;
        top: 60px;
        padding: 0;
        border-radius: 15px;
        font-size: 24px;
        line-height: 24px;
        color: #444;
        display: block;
    }

    .arrow:focus {
        outline: none;
    }

    .arrow:hover {
        background: #ccc;
        cursor: pointer;
    }

    .prev {
        left: 7px;
    }

    .next {
        right: 7px;
    }

    .gallery {
        width: 300px;
        overflow: hidden;
    }

    .gallery ul {
        height: 150px;
        width: 9999px;
        margin: 0;
        padding: 0;
        list-style: none;
        transition: margin-left 250ms;
        /* remove white-space between inline-block'ed li */
        /* http://davidwalsh.name/remove-whitespace-inline-block */

        font-size: 0;
    }

    .gallery li {
        display: inline-block;
    }
</style>