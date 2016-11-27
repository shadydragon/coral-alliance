// ------------------------------------
//
// Theme
//
// ------------------------------------

(function($) {

	if (typeof window.Theme == 'undefined') window.Theme = {};

	Theme = {

		settings: {},

		// ------------------------------------
		// Theme Init
		// ------------------------------------

		init: function() {
			// Run the resize functions first so everything is the right size
			this.resizeFunctions();

			// Other functions
			this.pastEntries();

			// run the resize function when the window is resized
			$(window).resize(this.resizeFunctions);
		},
		resizeFunctions: function() {
			console.log('resized');
			$('.page-template-template-home').find('.hero, .cta').css('min-height', $(window).innerHeight());
		},
		pastEntries: function() {
			// Update the entries and then refresh every 10 minutes.
			getEntries();
			window.setInterval(getEntries, 600000);

			function getEntries(){
				var arr = window.location.href.split('/'),
				count = 0,
				container = $('#past-entries'),
				compliments = ['became a reef legend', 'swept in and saved the reef', 'joined the reef defenders'];

				$.getJSON(arr[0] + "//" + arr[2] + '/wp-admin/admin-ajax.php?action=cfdb-export&form=Petition&limit=6&enc=JSON&format=map', function(data) {

					// Clean up the old entries
					container.find('.group').fadeOut(300, function() {
						$(this).remove();
						container.append('<div class="group hidden"></div>').find('.group').hide();
						// Add the new entries
						$.each(data, function(key, entry) {

							container.find('.group').append('<div class="item"><div class="time">' + timeSince(new Date(entry.Submitted)) + ' ago</div><div class="content">' + entry['full-name'].split(' ')[0] + ' ' + compliments[count] + '</div></div>');
							if (count >= compliments.length - 1) {
								count = 0;
							} else {
								count++;
							}
						});
						// Show the hidden items
						container.find('.group.hidden').removeClass('hidden').fadeIn(300);
					});

				});

			}

			// Figure out how long ago something happened http://stackoverflow.com/questions/3177836/how-to-format-time-since-xxx-e-g-4-minutes-ago-similar-to-stack-exchange-site
			function timeSince(date) {
				var delta = Math.round((+new Date - date) / 1000);

				var minute = 60,
				hour = minute * 60,
				day = hour * 24,
				week = day * 7;

				var response;

				if (delta < 30) {
					response = 'a few seconds';
				} else if (delta < minute) {
					response = delta + ' seconds';
				} else if (delta < 2 * minute) {
					response = 'a minute'
				} else if (delta < hour) {
					response = Math.floor(delta / minute) + ' minutes';
				} else if (Math.floor(delta / hour) == 1) {
					response = '1 hour'
				} else if (delta < day) {
					response = Math.floor(delta / hour) + ' hours';
				} else if (delta < day * 2) {
					response = 'yesterday';
				}

				return response;
			}




		}
	};

	module.exports = Theme;

})(jQuery);
