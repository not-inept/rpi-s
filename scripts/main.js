$(document).ready(function() {
	var section = "main";
	var row = 0, column = 0;
	var maxRow = maxColumn = 2;
	var zoomedIn = false;

	// versions to ensure correct image is loaded in the browser
	var version = 1;
	loadNewMap(false);

	function loadNewMap(fade) {
		if(typeof fade === 'undefined') {
			fade = true;
		}

		var mapName = 'map_' + row + '_' + column + '_' + version;
		var map = $('#map');

		if(fade) {
			map.fadeOut(300, function() {
				map.css('background-image', 'url(images/maps/' + mapName + '.png)');
				map.fadeIn(300, function() {
					determineArrows();
				});
			});
		} else {
			map.css('background-image', 'url(images/maps/' + mapName + '.png)');
		}
	}

	function determineArrows() {
		if(row != 0 && column != 0) { $('.backArrow').fadeIn(300) } else { $('.backArrow').fadeOut(300); }
		if(row > 1) { $('.topArrow').fadeIn(300) } else { $('.topArrow').fadeOut(300); }
		if(row > 0 && row < maxRow) { $('.bottomArrow').fadeIn(300) } else { $('.bottomArrow').fadeOut(300); }
		if(column > 1) { $('.leftArrow').fadeIn(300) } else { $('.leftArrow').fadeOut(300); }
		if(column > 0 && column < maxColumn) { $('.rightArrow').fadeIn(300) } else { $('.rightArrow').fadeOut(300); }
	}

	$(document).on('click', '#mapLayout table td', function() {
		// find closest "tr" row tag
		row = $(this).closest("tr").data('row');

		// get the value in the column attribute
		column = $(this).data('column');

		if(!zoomedIn) {
			zoomedIn = true;
			loadNewMap();
		}
	});

	$(document).on('click', '.backArrow', function(e) {
		e.stopPropagation();
		row = column = 0;
		section = "main";
		zoomedIn = false;

		loadNewMap();
	});

	$(document).on('click', '.arrow', function() {
		var arrow = $(this);

		if(arrow.hasClass('leftArrow')) {
			column -= 1;
		} else if(arrow.hasClass('rightArrow')) {
			column += 1;
		} else if(arrow.hasClass('topArrow')) {
			row -= 1;
		} else if(arrow.hasClass('bottomArrow')) {
			row += 1;
		}

		determineArrows();
		loadNewMap();
	});
});