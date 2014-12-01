$(document).ready(function() {
	//TODO: Have map lead to area.php

	// these can be changed later :)
	var locations = {
		'MAIN' : 'main',
		'LEGEND' : 1,
		'ECAV' : 2,
		'ACADEMICS' : 3,
		'DORMS' : 4
	};
	var section = locations.MAIN;
	var row = 0, column = 0;
	var maxRow = maxColumn = 2;
	var zoomedIn = false;

	// versions to ensure correct image is loaded in the browser
	var version = 1;
	loadNewMap(false);

	function setLocation(locString) {
		var uname = "anon";
		if ($('#name').length) {
			var uname = $('#name').html().split(':')[1].trim();
		}
		$('#location').html(uname + "@rpi-s: " + locString);
	}

	function loadNewMap(fade) {
		if(typeof fade === 'undefined') {
			fade = true;
		}

		var mapName = 'map_' + row + '_' + column + '_' + version;
		var map = $('#map');
		if (mapName == "map_0_0_1") {
			setLocation('/campus_map/main_map/');
		} else {
			setLocation('/campus_map/main_map/' + mapName + '/');
		}

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
		if(!zoomedIn) {
			zoomedIn = true;

			// find closest "tr" row tag
			row = $(this).closest("tr").data('row');

			// get the value in the column attribute
			column = $(this).data('column');
			
			loadNewMap();
		} else {
			var innerRow = $(this).closest("tr").data('row');
			var innerColumn = $(this).data('column');
			var location = 'area.php?loc=' + section + ',' + innerRow + ',' + innerColumn;
			window.location.href = location;
		}
	});

	$(document).on('click', '.backArrow', function(e) {
		if(zoomedIn) {
			e.stopPropagation();
			row = column = 0;
			section = locations.MAIN;
			zoomedIn = false;

			loadNewMap();
		}
	});

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