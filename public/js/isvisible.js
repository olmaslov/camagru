function getCoords(elem) {
	var box = elem.getBoundingClientRect();
	var body = document.body;
	var docEl = document.documentElement;
	var scrollTop = window.pageYOffset || docEl.scrollTop || body.scrollTop;
	var scrollLeft = window.pageXOffset || docEl.scrollLeft || body.scrollLeft;
	var clientTop = docEl.clientTop || body.clientTop || 0;
	var clientLeft = docEl.clientLeft || body.clientLeft || 0;
	var top = box.top + scrollTop - clientTop;
	var left = box.left + scrollLeft - clientLeft;

	return {
		top: top,
		left: left,
		scrollTop: scrollTop
	};
}

var evanim = new Event('anim');

/* catch element in visible zone */
function visible(elem) {
	var oTop = getCoords(elem).top - window.innerHeight;
	var pTop = getCoords(document.documentElement).scrollTop;
	if (pTop > oTop) {
		return 1;
	}
	else {
		return 0;
	}
}
