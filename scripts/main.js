$(document).ready(function() {
	var section = "main";
	var row = 0, column = 0;

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
		if(row != 0 && column != 0) { $('.backArrow').fadeIn(300) } else { $('.backArrow').fadeOut(300); }
		if(row > 1) { $('.topArrow').fadeIn(300) } else { $('.topArrow').fadeOut(300); }
		if(row > 0 && row < 3) { $('.bottomArrow').fadeIn(300) } else { $('.bottomArrow').fadeOut(300); }
		if(column > 1) { $('.leftArrow').fadeIn(300) } else { $('.leftArrow').fadeOut(300); }
		if(column > 0 && column < 3) { $('.rightArrow').fadeIn(300) } else { $('.rightArrow').fadeOut(300); }
	}

	$(document).on('click', '#mapLayout table td', function() {
		// find closest table header
		section = $(this).closest("table").attr('id');

		// find closest "tr" row tag
		row = $(this).closest("tr").data('row');

		// get the value in the column attribute
		column = $(this).data('column');

		loadNewMap();
	});

	$(document).on('click', '.backArrow', function(e) {
		e.stopPropagation();
		row = column = 0;
		section = "main";

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