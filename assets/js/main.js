/*Eventos Ajax*/
var sendHeader = (url = "" /*direccion*/, data ={}/*Object*/ , method = "POST" /*GET, POST, PUT, DELETE*/) =>{
	// Default options are marked with *
	return fetch(url, {
		method: method, // *GET, POST, PUT, DELETE, etc.
		mode: "cors", // no-cors, cors, *same-origin
		cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
		credentials: "same-origin", // include, same-origin, *omit
		headers: {
			"Content-Type": "application/json; charset=utf-8",
			"X-Auth-Token": $token,
			"data" : JSON.stringify(data)
			// "Content-Type": "application/x-www-form-urlencoded",
		},
		redirect: "follow", // manual, *follow, error
		referrer: "no-referrer", // no-referrer, *client
		//body: JSON.stringify(data), // body data type must match "Content-Type" header
	}).then(response => response.json()); // parses response to JSON
};

var sendPost = (url = "" /*direccion*/, data ={}/*Object*/ , method = "POST" /*GET, POST, PUT, DELETE*/) =>{
	// Default options are marked with *
	return fetch(url, {
		method: method, // *GET, POST, PUT, DELETE, etc.
		mode: "cors", // no-cors, cors, *same-origin
		cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
		credentials: "same-origin", // include, same-origin, *omit
		headers: {
			"Content-Type": "application/json; charset=utf-8",
		},
		redirect: "follow", // manual, *follow, error
		referrer: "no-referrer", // no-referrer, *client
		body: JSON.stringify(data), // body data type must match "Content-Type" header
	}).then(response => response.json()); // parses response to JSON
};

var sendGet = (url = "" /*direccion*/, data ={}/*Object*/ , method = "GET" /*GET, POST, PUT, DELETE*/) =>{
	// Default options are marked with *
	return fetch(url, {
		method: method, // *GET, POST, PUT, DELETE, etc.
	}).then(response => response); // parses response to JSON
};


/*(($ => {
	$(() => {
		$.prototype.fullscreen = function()
		{
			var $e = $(this);
			if(!$e.hasClass('modal-fullscreen')) return;
			bind($e);
		}

		function cssn($e, props) {
			let sum = 0;
			props.forEach(p => {
				sum += parseInt($e.css(p).match(/\d+/)[0]);
			});
			return sum;
		}
		function g($e)
		{
			return {
				width: cssn($e, ['margin-left', 'margin-right', 'padding-left', 'padding-right', 'border-left-width', 'border-right-width']),
				height: cssn($e, ['margin-top', 'margin-bottom', 'padding-top', 'padding-bottom', 'border-top-width', 'border-bottom-width']),
			};
		}
		function calc($e)
		{
			const wh = $(window).height();
			const ww = $(window).width();
			const $d = $e.find('.modal-dialog');
			$d.css('width', 'initial');
			$d.css('height', 'initial');
			$d.css('max-width', 'initial');
			$d.css('margin', '5px');
			const d = g($d);
			const $h = $e.find('.modal-header');
			const $f = $e.find('.modal-footer');
			const $b = $e.find('.modal-body');
			$b.css('overflow-y', 'scroll');
			const bh = wh - $h.outerHeight() - $f.outerHeight() - ($b.outerHeight()-$b.height()) - d.height;
			$b.height(bh);
		}
		function bind($e)
		{
			$e.on('show.bs.modal', e => {
				const $e = $(e.currentTarget).css('visibility', 'hidden');
			});
			$e.on('shown.bs.modal', e => {
				calc($(e.currentTarget));
				const $e = $(e.currentTarget).css('visibility', 'visible');
			});
		}
		$(window).resize(() => {
			calc($('.modal.modal-fullscreen.in'));
		});
		bind($('.modal-fullscreen'));
	});
}))(jQuery);
*/
