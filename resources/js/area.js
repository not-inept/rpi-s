$(document).ready(function() {
	var location = window.location.href.split('?loc=')[1].split(',');
	var section = Number(location[0]);
	var row = Number(location[1]);
	var column = Number(location[2]);

	// versions to ensure correct image is loaded in the browser
	var version = 1;
	loadNewMap(false);

	function loadNewMap(fade) {
		if(typeof fade === 'undefined') {
			fade = true;
		}

		var mapName = section + '/' + row + '_' + column;
		var map = $('#map');
		if(fade) {
			map.fadeOut(300, function() {
				map.css('background-image', 'url(resources/images/maps/' + mapName + '.png)');
				determineArrows();
				map.fadeIn(300)
			});
		} else {
			map.css('background-image', 'url(resources/images/maps/' + mapName + '.png)');
			determineArrows();
		}
	}

	function determineArrows() {
		if(row > 1) { $('.topArrow').show() } else { $('.topArrow').hide(); }
		if(row > 0 && row < 2) { $('.bottomArrow').show() } else { $('.bottomArrow').hide(); }
		if(column > 1) { $('.leftArrow').show() } else { $('.leftArrow').hide(); }
		if(column > 0 && column < 2) { $('.rightArrow').show() } else { $('.rightArrow').hide(); }
	}

	$(document).on('click', '.arrow', function() {
		var arrow = $(this);
		var isValid = true;

		if(column > 1 && arrow.hasClass('leftArrow')) {
			column -= 1;
		} else if(column < 2 && arrow.hasClass('rightArrow')) {
			column += 1;
		} else if(row > 1 && arrow.hasClass('topArrow')) {
			row -= 1;
		} else if(row < 2 && arrow.hasClass('bottomArrow')) {
			row += 1;
		} else {
			isValid = false;
		}

		if(isValid) {
			loadNewMap();
		}
	});
});