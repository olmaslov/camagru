document.addEventListener('DOMContentLoaded', function () {
	var forms = document.querySelectorAll('.toanim');
	// para = forms[1].parentNode.parentNode.cloneNode(true);
	// insertAfter(para, forms[forms.length - 1].parentNode.parentNode);
	var len = 0;
	while (len < forms.length) {
		if (visible(forms[len]))
			forms[len].classList.remove('toanim');
		len++;
	}
});

function insertAfter(elem, refElem) {
	return refElem.parentNode.insertBefore(elem, refElem.nextSibling);
}


window.onscroll = function () {
	var animpost = document.querySelectorAll('.toanim');
	var len = 0;
	while (len < animpost.length) {
		animpost[len].addEventListener('anim', function (e) {
			if (this.classList.contains('popup-left-corner') || this.classList.contains('comment-right'))
				this.classList.add('animated', 'slideInRight');
			else
				this.classList.add('animated', 'slideInLeft');
		});
		if (visible(animpost[len]) == 1)
			animpost[len].dispatchEvent(evanim);
		len++;
	}

	var post = document.querySelectorAll('.post');
	var lineend = document.getElementById('end');
	if (visible(lineend)) {
		loadPhotos(post[post.length - 1].dataset.postid);
	}
}