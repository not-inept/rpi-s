$(document).ready(function() {
	// these can be changed later :)
	var locations = {
		'MAIN' : 'main',
		'LEGEND' : 'legend',
		'ECAV' : 'ecav',
		'ACADEMICS' : 'academics',
		'DORMS' : 'dorms'
	};
	var section = locations.MAIN;
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
				map.css('background-image', 'url(resources/images/maps/' + mapName + '.png)');
				determineArrows();
				determineSection();
				map.fadeIn(300)
			});
		} else {
			map.css('background-image', 'url(resources/images/maps/' + mapName + '.png)');
			determineArrows();
			determineSection();
		}
	}

	function determineArrows() {
		if(row != 0 && column != 0) { $('.backArrow').show() } else { $('.backArrow').hide(); }
		if(row > 1) { $('.topArrow').show() } else { $('.topArrow').hide(); }
		if(row > 0 && row < maxRow) { $('.bottomArrow').show() } else { $('.bottomArrow').hide(); }
		if(column > 1) { $('.leftArrow').show() } else { $('.leftArrow').hide(); }
		if(column > 0 && column < maxColumn) { $('.rightArrow').show() } else { $('.rightArrow').hide(); }
	}

	function determineSection() {
		if(!zoomedIn) {
			section = locations.MAIN;
		} else {
			if (row == 1 && column == 1) {
				section = locations.LEGEND;
			} else if(row == 1 && column == 2) {
				section = locations.ECAV;
			} else if(row == 2 && column == 1) {
				section = locations.ACADEMICS;
			} else {
				section = locations.DORMS;
			}
		}
	}

	$(document).on('click', '#map table td', function() {
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
		section = locations.MAIN;
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

		loadNewMap();
	});
});