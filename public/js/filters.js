function linearGrad () {
    var width = arguments[0];
    var height = arguments[1];

    var texture = document.createElement('canvas');
    var ctx = texture.getContext('2d');

    texture.width = width;
    texture.height = height;

    var gradient = ctx.createLinearGradient(0, 0, width,0);

    var j = 0;
    var step = 1/arguments.length;
    for (var i = 2; i < arguments.length; i++) {
        gradient.addColorStop(j, arguments[i]);
        j+=step;
    }
    if (!arguments[3])
        gradient.addColorStop(1, "rgba(255, 255, 255, 0)");
    // gradient.addColorStop(0, col);
    // if (col1)
    //     gradient.addColorStop(1, col1);
    // else


    ctx.fillStyle = gradient;
    ctx.fillRect(0, 0, width, height);

    return ctx;
}


function radGrad (width, height, col, col1) {
    var texture = document.createElement('canvas');
    var ctx = texture.getContext('2d');

    texture.width = width;
    texture.height = height;

    var gradient = ctx.createRadialGradient(width / 2, height / 2, 0, width / 2, height / 2, width * 0.6);

    var j = 0;
    var step = 1/arguments.length;
    for (var i = 2; i < arguments.length; i++) {
        gradient.addColorStop(j, arguments[i]);
        j+=step;
    }
    if (!arguments[3])
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
    // Make a copy of the current frame in the video on the canvas.
    ctx.translate(width, 0);
    ctx.scale(-1, 1);
    ctx.drawImage(video, 0, 0, width, height);
    // ctx.globalAlpha = 1;
    ctx.globalCompositeOperation = 'darken';
    var gradient = linearGrad(width, height, "rgba(66, 10, 14, .2)");
    ctx.drawImage(gradient.canvas, 0, 0, width, height);
}

function _1977Filter(ctx, width, height) {
    ctx.filter = 'contrast(110%) brightness(110%) saturate(130%)';
    // Make a copy of the current frame in the video on the canvas.
    ctx.translate(width, 0);
    ctx.scale(-1, 1);
    ctx.drawImage(video, 0, 0, width, height);
    // ctx.globalAlpha = 1;
    ctx.globalCompositeOperation = 'screen';
    var gradient = backCol(width, height, "rgba(243, 106, 188, .3)");
    ctx.drawImage(gradient.canvas, 0, 0, width, height);
}

function brannanFilter(ctx, width, height) {
    ctx.filter = 'sepia(0.5) contrast(1.4)';
    // Make a copy of the current frame in the video on the canvas.
    ctx.translate(width, 0);
    ctx.scale(-1, 1);
    ctx.drawImage(video, 0, 0, width, height);
    // ctx.globalAlpha = 1;
    ctx.globalCompositeOperation = 'lighten';
    var gradient =backCol(width, height, "rgba(161, 44, 199, .31)");
    ctx.drawImage(gradient.canvas, 0, 0, width, height);
}

function brooklynFilter(ctx, width, height) {
    ctx.filter = 'contrast(.9) brightness(1.1)';
    // Make a copy of the current frame in the video on the canvas.
    ctx.translate(width, 0);
    ctx.scale(-1, 1);
    ctx.drawImage(video, 0, 0, width, height);
    // ctx.globalAlpha = 1;
    ctx.globalCompositeOperation = 'overlay';
    var gradient = radGrad(width, height, "rgba(168, 223, 193, .4)", "rgb(196, 183, 200)");
    ctx.drawImage(gradient.canvas, 0, 0, width, height);
}

function clarendonFilter(ctx, width, height) {
    ctx.filter = 'contrast(1.2) saturate(1.35)';
    // Make a copy of the current frame in the video on the canvas.
    ctx.translate(width, 0);
    ctx.scale(-1, 1);
    ctx.drawImage(video, 0, 0, width, height);
    // ctx.globalAlpha = 1;
    ctx.globalCompositeOperation = 'overlay';
    var gradient = backCol(width, height, "rgba(127, 187, 227, .2)");
    ctx.drawImage(gradient.canvas, 0, 0, width, height);
}

function earlybirdFilter(ctx, width, height) {
    ctx.filter = 'contrast(0.9) sepia(0.2)';
    // Make a copy of the current frame in the video on the canvas.
    ctx.translate(width, 0);
    ctx.scale(-1, 1);
    ctx.drawImage(video, 0, 0, width, height);
    ctx.globalCompositeOperation = 'overlay';
    ctx.globalAlpha =0.5;
    var gradient = radGrad(width, height, "rgb(208, 186, 142)", "rgb(54, 3, 9)", "rgb(29, 2, 16)");
    ctx.drawImage(gradient.canvas, 0, 0, width, height);
}

