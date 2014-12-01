$(document).ready(function() {
	var location = window.location.href.split('?loc=')[1].split(',');
	var section = Number(location[0]);
	var row = Number(location[1]);
	var column = Number(location[2]);

	var mapName = section + '/' + row + '_' + column;
	determineArrows();
	setLocation('/campus_map/' + mapName + '/');

	function setLocation(locString) {
		var uname = "anon";
		if ($('#name').length) {
			var uname = $('#name').html().trim();
		}
		$('#location').html(uname + "@rpi-s: " + locString);
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
			window.location.href = "area.php?loc=" + section + "," + row + "," + column;
		}
	});
});