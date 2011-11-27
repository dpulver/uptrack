	$(function() {
		// run the currently selected effect
		function runEffect() {
			// get effect type from 
			var selectedEffect = $( "#effectTypes" ).val();

			// most effect types need no options passed by default
			var options = {};
			// some effects have required parameters
			if ( selectedEffect === "scale" ) {
				options = { percent: 0 };
			} else if ( selectedEffect === "size" ) {
				options = { to: { width: 200, height: 60 } };
			}

			// run the effect
			$( ".altrow" ).hide( 'blind', options, 1000 );
		};

		// callback function to bring a hidden box back
		function callback() {
			setTimeout(function() {
				$( ".altrow" ).removeAttr( "style" ).hide().fadeIn();
			}, 1000 );
		};

		// set effect from select menu value
		$( "#hide-parent-properties" ).click(function() {
			runEffect();
			return false;
		});
	});
	