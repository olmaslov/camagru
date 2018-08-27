// window.onscroll = function() {
// 	var lineend = document.getElementById('end');
// 	if (visible(lineend)){
//
// 	}
// }

function loadPhotos(lastid) {
	var lineend = document.getElementById('end');
	if (visible(lineend)){
		setTimeout(function (){lineend.classList.remove('end')}, 1000);
		console.log(lastid);
	}

}