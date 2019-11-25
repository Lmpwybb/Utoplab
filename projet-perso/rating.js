StarOutUrl = 'StarOut.gif';
StarHoverUrl = 'StarOver.gif';
StarBaseId = 'Star';
NbStar = 5;

// This function allows to know the star that we are hover or not.
function Name2Nb(Star) {
	// 	Here we are getting the id of the star with lastIndexOf, it will get the number id cause it's the last.
	LgtStarBaseId=StarBaseId.lastIndexOf('');
	// Here slice will create a shallow copy of an array made with the previous one.
	StarNb=Star.slice(LgtStarBaseId);
	return(StarNb);
}

// This function displays the StarHoverUrl with the id associated due to the function Name2Nb.
function StarOver(Star) {
	StarNb = Name2Nb(Star);
	for (i=1;i<(StarNb*1)+1;i++) {
		document.getElementById('Star'+i).src = StarHoverUrl;
	}
}

// This function displays the StarOutUrl with the id associated due to the function Name2Nb.
function StarOut(Star) {
	StarNb = Name2Nb(Star);
	for (i=1;i<(StarNb*1)+1;i++) {
		document.getElementById('Star'+i).src = StarOutUrl;
	}
}

// The bodyonload will start this function.
function NotationSystem() {
	for (i=1;i<NbStar+1;i++) {
		var img = document.getElementById('Star'+i);
		img.src= StarOutUrl;
		// 	On mouseover the StarOver() function start.
		img.onmouseover = function() {
			StarOver(this.id);
		};
		// 	On mouseout the StarOut() function start.
		img.onmouseout = function() {
			StarOut(this.id);
		};
		// 	This will make an alert of the rate you gave.
		img.onclick = function() {
			alert('Vous avez donné la note de '+Name2Nb(this.id)+'.');
		};
	}
}
