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

			// Add smooth scrolling to the anchor tags
			$('a[href*="#"]:not([href="#"])').click(function() {
				if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
					var target = $(this.hash);
					target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
					if (target.length) {
						$('html, body').animate({
							scrollTop: target.offset().top
						}, 1000);
						return false;
					}
				}
			});
		},
		resizeFunctions: function() {
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
							container.find('.group').append('<div class="item"><div class="time">' + moment(entry.Submitted, "YYYY-MM-DD HH:mm:ss Z").fromNow() + '</div><div class="content">' + entry['full-name'].split(' ')[0] + ' ' + compliments[count] + '</div></div>');
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

		}
	};

	module.exports = Theme;

})(jQuery);
