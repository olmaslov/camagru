function linearGrad () {
    var width = arguments[0];
    var height = arguments[1];

    var texture = document.createElement('canvas');
    var ctx = texture.getContext('2d');

    texture.width = width;
    texture.height = height;

    if (arguments[2] == "to bot")
        var gradient = ctx.createLinearGradient(0, 0, 0, height);
    else if (arguments[2] == "to right")
        var gradient = ctx.createLinearGradient(0, 0, width, 0);
    var j = 0;
    var step = 1/(arguments.length - 3);
    for (var i = 3; i < arguments.length; i++) {
        gradient.addColorStop(j, arguments[i]);
        j = j + (step * 2) > 1 ? 1 : j + (step * 2);
    }
    if (!arguments[4])
        gradient.addColorStop(1, "rgba(255, 255, 255, 0)");

    ctx.fillStyle = gradient;
    ctx.fillRect(0, 0, width, height);

    return ctx;
}


function radGrad () {
    var width = arguments[0];
    var height = arguments[1];
    var texture = document.createElement('canvas');
    var ctx = texture.getContext('2d');

    texture.width = width;
    texture.height = height;

    var gradient = ctx.createRadialGradient(width / 2, height / 2, 0, width / 2, height / 2, width);

    var j = 0;
    var step = 1/(arguments.length - 2);
    for (var i = 2; i < arguments.length; i++) {
        gradient.addColorStop(j, arguments[i]);
        j = j + (step * 2) > 1 ? 1 : j + (step * 2);
    }
    if (!arguments[4])
        gradient.addColorStop(1, "rgba(255, 255, 255, 0)");

    ctx.fillStyle = gradient;
    ctx.fillRect(0, 0, width, height);
    return ctx;
}

function backCol (width, height, col) {
    var texture = document.createElement('canvas');
    var ctx = texture.getContext('2d');

    texture.width = width;
    texture.height = height;
    ctx.fillStyle = col;
    ctx.fillRect(0, 0, width, height);
    return ctx;
}

function adenFilter(ctx, width, height) {
    ctx.filter = 'hue-rotate(-20) contrast(90%) brightness(120%) saturate(85%)';
    // Make a copy of the current frame in the image on the canvas.
    // ctx.translate(width, 0);
    // ctx.scale(-1, 1);
    ctx.drawImage(vidc, 0, 0, width, height);
    // ctx.globalAlpha = 1;
    ctx.globalCompositeOperation = 'darken';
    var gradient = linearGrad(width, height, "to right", "rgba(66, 10, 14, .2)");
    ctx.drawImage(gradient.canvas, 0, 0, width, height);
}

function noneFilter(ctx, width, height) {
    ctx.drawImage(vidc, 0, 0, width, height);
}

function _1977Filter(ctx, width, height) {
    ctx.filter = 'contrast(110%) brightness(110%) saturate(130%)';
    // Make a copy of the current frame in the image on the canvas.
    // ctx.translate(width, 0);
    // ctx.scale(-1, 1);
    ctx.drawImage(vidc, 0, 0, width, height);
    // ctx.globalAlpha = 1;
    ctx.globalCompositeOperation = 'screen';
    var gradient = backCol(width, height, "rgba(243, 106, 188, .3)");
    ctx.drawImage(gradient.canvas, 0, 0, width, height);
}

function brannanFilter(ctx, width, height) {
    ctx.filter = 'sepia(0.5) contrast(1.4)';
    // Make a copy of the current frame in the image on the canvas.
    // ctx.translate(width, 0);
    // ctx.scale(-1, 1);
    ctx.drawImage(vidc, 0, 0, width, height);
    // ctx.globalAlpha = 1;
    ctx.globalCompositeOperation = 'lighten';
    var gradient =backCol(width, height, "rgba(161, 44, 199, .31)");
    ctx.drawImage(gradient.canvas, 0, 0, width, height);
}

function brooklynFilter(ctx, width, height) {
    ctx.filter = 'contrast(.9) brightness(1.1)';
    // Make a copy of the current frame in the image on the canvas.
    // ctx.translate(width, 0);
    // ctx.scale(-1, 1);
    ctx.drawImage(vidc, 0, 0, width, height);
    // ctx.globalAlpha = 1;
    ctx.globalCompositeOperation = 'overlay';
    var gradient = radGrad(width, height, "rgba(168, 223, 193, .4)", "rgb(196, 183, 200)");
    ctx.drawImage(gradient.canvas, 0, 0, width, height);
}

function clarendonFilter(ctx, width, height) {
    ctx.filter = 'contrast(1.2) saturate(1.35)';
    // Make a copy of the current frame in the image on the canvas.
    // ctx.translate(width, 0);
    // ctx.scale(-1, 1);
    ctx.drawImage(vidc, 0, 0, width, height);
    // ctx.globalAlpha = 1;
    ctx.globalCompositeOperation = 'overlay';
    var gradient = backCol(width, height, "rgba(127, 187, 227, .2)");
    ctx.drawImage(gradient.canvas, 0, 0, width, height);
}

function earlybirdFilter(ctx, width, height) {
    ctx.filter = 'contrast(0.9) sepia(0.2)';
    // Make a copy of the current frame in the image on the canvas.
    // ctx.translate(width, 0);
    // ctx.scale(-1, 1);
    ctx.drawImage(vidc, 0, 0, width, height);
    ctx.globalCompositeOperation = 'overlay';
    ctx.globalAlpha = 0.5;
    var gradient = radGrad(width, height, "rgb(208, 186, 142)", "rgb(54, 3, 9)", "rgb(29, 2, 16)");
    ctx.drawImage(gradient.canvas, 0, 0, width, height);
}

function ginghamFilter(ctx, width, height) {
    ctx.filter = 'brightness(1.05) hue-rotate(-10deg)';
    // Make a copy of the current frame in the image on the canvas.
    // ctx.translate(width, 0);
    // ctx.scale(-1, 1);
    ctx.drawImage(vidc, 0, 0, width, height);
    ctx.globalCompositeOperation = 'soft-light';
    // ctx.globalAlpha =0.5;
    var gradient = backCol(width, height, "rgb(230, 230, 250)");
    ctx.drawImage(gradient.canvas, 0, 0, width, height);
}

function hudsonFilter(ctx, width, height) {
    ctx.filter = 'brightness(1.2) contrast(.9) saturate(1.1)';
    // Make a copy of the current frame in the image on the canvas.
    // ctx.translate(width, 0);
    // ctx.scale(-1, 1);
    ctx.drawImage(vidc, 0, 0, width, height);
    ctx.globalCompositeOperation = 'multiply';
    var gradient = radGrad(width, height, "rgba(166, 177, 255, 0.5)", "rgba(52, 33, 52, 0.5)");
    ctx.globalAlpha =0.5;
    ctx.drawImage(gradient.canvas, 0, 0, width, height);
}

function inkwellFilter(ctx, width, height) {
    ctx.filter = 'sepia(.3) contrast(1.1) brightness(1.1) grayscale(1)';
    // Make a copy of the current frame in the image on the canvas.
    // ctx.translate(width, 0);
    // ctx.scale(-1, 1);
    ctx.drawImage(vidc, 0, 0, width, height);
}

function lofiFilter(ctx, width, height) {
    ctx.filter = 'saturate(1.1) contrast(1.5)';
    // Make a copy of the current frame in the image on the canvas.
    // ctx.translate(width, 0);
    // ctx.scale(-1, 1);
    ctx.drawImage(vidc, 0, 0, width, height);
    ctx.globalCompositeOperation = 'multiply';
    var gradient = radGrad(width, height, "rgba(255, 255, 255, 0)", "rgb(34, 34, 34)");
    // ctx.globalAlpha =0.5;
    ctx.drawImage(gradient.canvas, 0, 0, width, height);
}

function mavenFilter(ctx, width, height) {
    ctx.filter = 'sepia(.25) brightness(.95) contrast(.95) saturate(1.5)';
    // Make a copy of the current frame in the image on the canvas.
    // ctx.translate(width, 0);
    // ctx.scale(-1, 1);
    ctx.drawImage(vidc, 0, 0, width, height);
    ctx.globalCompositeOperation = 'hue';
    var gradient = backCol(width, height, "rgba(3, 230, 26, .20)");
    // ctx.globalAlpha =0.5;
    ctx.drawImage(gradient.canvas, 0, 0, width, height);
}

function mayfairFilter(ctx, width, height) {
    ctx.filter = 'contrast(1.1) saturate(1.1)';
    // Make a copy of the current frame in the image on the canvas.
    // ctx.translate(width, 0);
    // ctx.scale(-1, 1);
    ctx.drawImage(vidc, 0, 0, width, height);
    ctx.globalCompositeOperation = 'overlay';
    var gradient = radGrad(width, height, "rgba(255, 255, 255, .8)", "rgba(255, 200, 200, .6)", "rgb(17, 17, 17)");
    // ctx.globalAlpha =0.5;
    ctx.drawImage(gradient.canvas, 0, 0, width, height);
}

function perpetuaFilter(ctx, width, height) {
    ctx.filter = 'contrast(1.1) saturate(1.1)';
    // Make a copy of the current frame in the image on the canvas.
    // ctx.translate(width, 0);
    // ctx.scale(-1, 1);
    ctx.drawImage(vidc, 0, 0, width, height);
    ctx.globalCompositeOperation = 'soft-light';
    var gradient = linearGrad(width, height, "to bot", "rgba(0, 91, 154, 0.5)", "rgba(230, 193, 61, 0.5)");
    // ctx.globalAlpha =0.5;
    ctx.drawImage(gradient.canvas, 0, 0, width, height);
}

function reyesFilter(ctx, width, height) {
    ctx.filter = 'sepia(.22) brightness(1.1) contrast(.85) saturate(.75)';
    // Make a copy of the current frame in the image on the canvas.
    // ctx.translate(width, 0);
    // ctx.scale(-1, 1);
    ctx.drawImage(vidc, 0, 0, width, height);
    ctx.globalCompositeOperation = 'soft-light';
    var gradient = backCol(width, height, "rgba(239, 205, 173, 0.5)");
    // ctx.globalAlpha =0.5;
    ctx.drawImage(gradient.canvas, 0, 0, width, height);
}

function stinsonFilter(ctx, width, height) {
    ctx.filter = 'contrast(0.75) saturate(0.85) brightness(1.15)';
    // Make a copy of the current frame in the image on the canvas.
    // ctx.translate(width, 0);
    // ctx.scale(-1, 1);
    ctx.drawImage(vidc, 0, 0, width, height);
    ctx.globalCompositeOperation = 'soft-light';
    var gradient = backCol(width, height, "rgba(240, 149, 128, .2)");
    // ctx.globalAlpha =0.5;
    ctx.drawImage(gradient.canvas, 0, 0, width, height);
}

function toasterFilter(ctx, width, height) {
    ctx.filter = 'contrast(1.5) brightness(.9)';
    // Make a copy of the current frame in the image on the canvas.
    // ctx.translate(width, 0);
    // ctx.scale(-1, 1);
    ctx.drawImage(vidc, 0, 0, width, height);
    ctx.globalCompositeOperation = 'screen';
    var gradient = radGrad(width, height, "rgb(128, 78, 15)", "rgb(59, 0, 59)");
    // ctx.globalAlpha =0.5;
    ctx.drawImage(gradient.canvas, 0, 0, width, height);
}

function valenciaFilter(ctx, width, height) {
    ctx.filter = 'contrast(1.08) brightness(1.08) sepia(0.08)';
    // Make a copy of the current frame in the image on the canvas.
    // ctx.translate(width, 0);
    // ctx.scale(-1, 1);
    ctx.drawImage(vidc, 0, 0, width, height);
    ctx.globalCompositeOperation = 'exclusion';
    var gradient = backCol(width, height, "rgba(58, 3, 57, 0.5)");
    // ctx.globalAlpha =0.5;
    ctx.drawImage(gradient.canvas, 0, 0, width, height);
}

function waldenFilter(ctx, width, height) {
    ctx.filter = 'brightness(1.1) hue-rotate(-10) sepia(.3) saturate(1.6)';
    // Make a copy of the current frame in the image on the canvas.
    // ctx.translate(width, 0);
    // ctx.scale(-1, 1);
    ctx.drawImage(vidc, 0, 0, width, height);
    ctx.globalCompositeOperation = 'screen';
    var gradient = backCol(width, height, "rgba(0, 68, 204, 0.3)");
    // ctx.globalAlpha =0.5;
    ctx.drawImage(gradient.canvas, 0, 0, width, height);
}

function xpro2Filter(ctx, width, height) {
    ctx.filter = 'sepia(.3)';
    // Make a copy of the current frame in the image on the canvas.
    // ctx.translate(width, 0);
    // ctx.scale(-1, 1);
    ctx.drawImage(vidc, 0, 0, width, height);
    ctx.globalCompositeOperation = 'color-burn';
    var gradient = radGrad(width, height, "rgb(230, 231, 224)", "rgba(43, 42, 161, .6)");
    // ctx.globalAlpha =0.5;
    ctx.drawImage(gradient.canvas, 0, 0, width, height);
}
