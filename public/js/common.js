function doAjax(url, method, data, callback) {
	$.ajax(url, {
		type: method,
		data: data
	}).done(callback);
}