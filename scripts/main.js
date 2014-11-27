$(document).ready(function() {
	var section = "main";
	var row = 0;
	var column = 0;
	var zoomedIn = false;

	function tableClicked() {
		switch(section) {
			case "main":
				zoomedIn = true;
				loadNewMap();
				break;
		}
	}

	function loadNewMap() {
		var mapName = 'map_' + row + '_' + column;

		$.get('resources/maps/' + mapName + '.php', function(response) {
			var map = $('#map');

			map.fadeOut(300, function() {
				map.css('background-image', 'url(images/maps/' + mapName + '.png)');
				$('#mapLayout').html(response);
				map.fadeIn(300, function() {
					determineArrows();
				});
			});
		});
	}

	function determineArrows() {
		if(zoomedIn) { $('.backArrow').fadeIn(300) } else { $('.backArrow').fadeOut(300); }
		if(row > 1 && zoomedIn) { $('.topArrow').fadeIn(300) } else { $('.topArrow').fadeOut(300); }
		if(row < 3 && zoomedIn) { $('.bottomArrow').fadeIn(300) } else { $('.bottomArrow').fadeOut(300); }
		if(column > 1 && zoomedIn) { $('.leftArrow').fadeIn(300) } else { $('.leftArrow').fadeOut(300); }
		if(column < 3 && zoomedIn) { $('.rightArrow').fadeIn(300) } else { $('.rightArrow').fadeOut(300); }
	}

	$(document).on('click', '#mapLayout table td', function() {
		// find closest table header
		section = $(this).closest("table").attr('id');

		// find closest "tr" row tag
		row = $(this).closest("tr").data('row');

		// get the value in the column attribute
		column = $(this).data('column');

		tableClicked();
	});

	$(document).on('click', '.backArrow', function(e) {
		e.stopPropagation();
		row = 0;
		column = 0;
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
		// loadNewMap();
	});
});