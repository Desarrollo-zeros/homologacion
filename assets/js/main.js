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



/*AJAX */
var Post = function($url,$subUrl = '',$id = '') {
	this.$url = $url+$subUrl+ "/"+$id;
	this.$data = Object();
	this.$sendPost = Post.ajax;
};

Post.ajax = {
	constructor:  Post,
	setPost : function($data){
		post.$data = $.ajax({
			url : post.$url,
			dataType : 'JSON',
			type : 'POST',
			data : $data,
			async: false,
			cache: false,
			contentType: false,
			processData: false,
		}).responseText;
	},
	getPost : function () {
		//JSON.parsepost.$data = ((Object.keys(post.$data ).length === 0))  ? {"estado" : false} : (post.$data);
		return JSON.parse(post.$data);
	},
	setGet : function ($c,$data) {
		post.$data = $.ajax({
			url : post.$url+"/?"+$c+"="+$data,
			dataType : 'JSON',
			type : 'GET',
			async: false,
		}).responseText;
	},
	setNpost : function($data){
		post.$data = $.ajax({
			url : post.$url,
			dataType : 'JSON',
			type : 'POST',
			data : $data,
			async: false
		}).responseText;
	},
	getGEt : function () {
		post.$data = ((Object.keys(post.$data ).length === 0))  ? {"estado" : false} : (post.$data);
		return post.$data;
	},

};
//Post.ajax.constructor = Post;
Post.ajax.ajax = Post;
var urlPost = "";
