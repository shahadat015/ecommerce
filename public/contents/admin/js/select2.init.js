$(function () {
	$(".select2").select2({
		width: "100%"
	});

	// select2 ajax product retrive
	$(".select_product").select2({
		width: "100%",
		tags: false,
		multiple: true,
		tokenSeparators: [',', ' '],
		minimumInputLength: 2,
		minimumResultsForSearch: 10,
		ajax: {
			url: route('getProducts'),
			dataType: "json",
			type: "GET",
			data: function (params) {

				var queryParameters = {
					term: params.term
				}
				return queryParameters;
			},
			processResults: function (data) {
				return {
					results: $.map(data, function (item) {
						return {
							text: item.name,
							id: item.id
						}
					})
				};
			}
		}
	});

	function route(route){
        var url = route.replace(/\./g, '/');
        return window.origin + '/admin/' + url;
    }
});