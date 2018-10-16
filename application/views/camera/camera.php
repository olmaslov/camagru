<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 08.10.2018
 * Time: 18:41
 */
?>

<div class="test_abs">
    <div id="modal-content">
        <div class="modal-camera">
            <div class="back"></div>
            <div class="container admin-inner">
                <div class="row justify-content-center admin-inner">
                    <div class="col-sm-9 left-admin">
                        <div class="row">

                            <div class="app">

                                <a href="#" id="start-camera" class="visible">Touch here to start the app.</a>
                                <video id="camera-stream" class="" muted></video>
                                <img id="snap">

                                <p id="error-message"></p>

                                <div class="controls">
                                    <button id="delete-photo" title="Delete Photo" class="disabled"><i
                                                class="material-icons">delete</i></button>
                                    <button id="take-photo" title="Take Photo"><i class="material-icons">camera_alt</i>
                                    </button>
                                    <button id="upload-photo" class="visible"><i class="material-icons">file_upload</i>
                                    </button>
                                    <button id="erase-filter" class="hide disabled visible"><i class="material-icons">filter_none</i>
                                    </button>
                                </div>

                                <input type="file" style="display: none" id="upload">
                                <!-- Hidden canvas element. Used for taking snapshot of video. -->
                                <canvas></canvas>
                                <img id="tmpimg" class="hide"/>

                            </div>

                        </div>
                        <div class="row">
                            <p class="text-center col-sm-12">Masks</p>
                        </div>
                        <div class="row justify-content-center masks-gallery ">
                            <div class="disabled" id="mg">
                                <img class="masks" src="public/img/masks/42_Logo.png" alt="42_Logo">
                                <img class="masks" src="public/img/masks/logoUNIT.png" alt="logoUNIT">
                                <img class="masks" src="public/img/masks/unit-city-logo-white.png"
                                     alt="unit-city-logo-white">
                                <img class="masks" src="public/img/masks/unit-logo-white.png" alt="unit-logo-white">
                                <img class="masks" src="public/img/masks/unit-logo-white-vertical.png"
                                     alt="unit-logo-white-vertical">
                            </div>
                        </div>
                        <div class="row">
                            <p class="text-center col-sm-12">Filters:</p>
                        </div>
                        <div class="row">
                            <div class="filter-gallery disabled" id="fg">
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
                                <textarea id="descr" placeholder="Put your comment here"></textarea>
                            </div>
                            <div class="col-2 pcom">
                                <i class="material-icons sendcomm disabled" id="svpic">send</i>
                            </div>
                        </div>
                    </div>
                    <div class="right-admin col-sm-3">
                        <div class="col-sm-12 photos" id="thumbnails">
                            <?php
                            if (isset($vars[0]['id'])) {
                                foreach ($vars as $val) {
                                    echo "<div class=\"row\" >
                                    <div class=\"thumbnail\" id=\"thumb" . $val['id'] . "\" onclick=\"thumbClick(" . $val['id'] . ")\" >
                                        <img src = \"private/photo/" . $val['id'] . ".png\" >
                                        <div class=\"sel\"><i class=\"material-icons\">check_circle</i></div>
                                    </div >
                                    
                                  </div >";
                                }
                            }
                            ?>
                        </div>
                        <div class="row bottom-btn">
                            <input type="button" name="" id="del_photos" class="log-bnt inp-log col-sm-12 disabled" onclick="delPosts()"
                                   value="Delete">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="/camagru_mvc/public/js/test.js"></script>
<script>
    (function () {
        function scrollHorizontally(e) {
            e = window.event || e;
            var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
            document.getElementById('fg').scrollLeft -= (delta * 40); // Multiplied by 40
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
