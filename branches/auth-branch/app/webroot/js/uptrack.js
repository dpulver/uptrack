	$(function() {
		// run the currently selected effect
		function runEffect() {
			// most effect types need no options passed by default
			var options = {};
			$( ".completed" ).toggle( 'blind', options, 'fast' );
			$( "#hide-completed-interventions" ).toggleClass("active");
		};

		// set effect from select menu value
		$( "#hide-completed-interventions" ).click(function() {
			runEffect();
			return false;
		});
	});
	