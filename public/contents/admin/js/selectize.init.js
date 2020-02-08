$(function () {
	$('.carousel1Products').selectize({
        plugins: ['remove_button'],
        valueField: 'id',
        labelField: 'name',
        searchField:'name',
        options: [],
        create: false,
        load: function(query, callback) {
            if (!query.length) return callback();

            $.ajax({
                url: route('getProducts'),
                type: 'GET',
                dataType: 'json',
                data: {
                    name: query,
                },
                error: function() {
                    callback();
                },
                success: function(res) {
                    callback(res);
                }
            });
        },
        onInitialize: function(){
		    var selectize = this;
		    $.get(route('carousel.1.products'), function( data ) {
		        selectize.addOption(data); // This is will add to option
		        var selected_items = [];
		        $.each(data, function(i, obj) {
		            selected_items.push(obj.id);
		        });
		        selectize.setValue(selected_items); //this will set option values as default
		    });
		}
    });
    
	$('.carousel2Products').selectize({
        plugins: ['remove_button'],
        valueField: 'id',
        labelField: 'name',
        searchField:'name',
        options: [],
        create: false,
        load: function(query, callback) {
            if (!query.length) return callback();

            $.ajax({
                url: route('getProducts'),
                type: 'GET',
                dataType: 'json',
                data: {
                    name: query,
                },
                error: function() {
                    callback();
                },
                success: function(res) {
                    callback(res);
                }
            });
        },
        onInitialize: function(){
		    var selectize = this;
		    $.get(route('carousel.2.products'), function( data ) {
		        selectize.addOption(data); // This is will add to option
		        var selected_items = [];
		        $.each(data, function(i, obj) {
		            selected_items.push(obj.id);
		        });
		        selectize.setValue(selected_items); //this will set option values as default
		    });
		}
    });

	$('.carousel3Products').selectize({
        plugins: ['remove_button'],
        valueField: 'id',
        labelField: 'name',
        searchField:'name',
        options: [],
        create: false,
        load: function(query, callback) {
            if (!query.length) return callback();

            $.ajax({
                url: route('getProducts'),
                type: 'GET',
                dataType: 'json',
                data: {
                    name: query,
                },
                error: function() {
                    callback();
                },
                success: function(res) {
                    callback(res);
                }
            });
        },
        onInitialize: function(){
		    var selectize = this;
		    $.get(route('carousel.3.products'), function( data ) {
		        selectize.addOption(data); // This is will add to option
		        var selected_items = [];
		        $.each(data, function(i, obj) {
		            selected_items.push(obj.id);
		        });
		        selectize.setValue(selected_items); //this will set option values as default
		    });
		}
    });

	$('.featuredProducts').selectize({
        plugins: ['remove_button'],
        valueField: 'id',
        labelField: 'name',
        searchField:'name',
        options: [],
        create: false,
        load: function(query, callback) {
            if (!query.length) return callback();

            $.ajax({
                url: route('getProducts'),
                type: 'GET',
                dataType: 'json',
                data: {
                    name: query,
                },
                error: function() {
                    callback();
                },
                success: function(res) {
                    callback(res);
                }
            });
        },
        onInitialize: function(){
		    var selectize = this;
		    $.get(route('featuredProducts'), function( data ) {
		        selectize.addOption(data); // This is will add to option
		        var selected_items = [];
		        $.each(data, function(i, obj) {
		            selected_items.push(obj.id);
		        });
		        selectize.setValue(selected_items); //this will set option values as default
		    });
		}
    });

	$('.tab1Products').selectize({
        plugins: ['remove_button'],
        valueField: 'id',
        labelField: 'name',
        searchField:'name',
        options: [],
        create: false,
        load: function(query, callback) {
            if (!query.length) return callback();

            $.ajax({
                url: route('getProducts'),
                type: 'GET',
                dataType: 'json',
                data: {
                    name: query,
                },
                error: function() {
                    callback();
                },
                success: function(res) {
                    callback(res);
                }
            });
        },
        onInitialize: function(){
		    var selectize = this;
		    $.get(route('tab.1.products'), function( data ) {
		        selectize.addOption(data); // This is will add to option
		        var selected_items = [];
		        $.each(data, function(i, obj) {
		            selected_items.push(obj.id);
		        });
		        selectize.setValue(selected_items); //this will set option values as default
		    });
		}
    });

	$('.tab2Products').selectize({
        plugins: ['remove_button'],
        valueField: 'id',
        labelField: 'name',
        searchField:'name',
        options: [],
        create: false,
        load: function(query, callback) {
            if (!query.length) return callback();

            $.ajax({
                url: route('getProducts'),
                type: 'GET',
                dataType: 'json',
                data: {
                    name: query,
                },
                error: function() {
                    callback();
                },
                success: function(res) {
                    callback(res);
                }
            });
        },
        onInitialize: function(){
		    var selectize = this;
		    $.get(route('tab.2.products'), function( data ) {
		        selectize.addOption(data); // This is will add to option
		        var selected_items = [];
		        $.each(data, function(i, obj) {
		            selected_items.push(obj.id);
		        });
		        selectize.setValue(selected_items); //this will set option values as default
		    });
		}
    });

	$('.tab3Products').selectize({
        plugins: ['remove_button'],
        valueField: 'id',
        labelField: 'name',
        searchField:'name',
        options: [],
        create: false,
        load: function(query, callback) {
            if (!query.length) return callback();

            $.ajax({
                url: route('getProducts'),
                type: 'GET',
                dataType: 'json',
                data: {
                    name: query,
                },
                error: function() {
                    callback();
                },
                success: function(res) {
                    callback(res);
                }
            });
        },
        onInitialize: function(){
		    var selectize = this;
		    $.get(route('tab.3.products'), function( data ) {
		        selectize.addOption(data); // This is will add to option
		        var selected_items = [];
		        $.each(data, function(i, obj) {
		            selected_items.push(obj.id);
		        });
		        selectize.setValue(selected_items); //this will set option values as default
		    });
		}
    });

	function route(route){
        var url = route.replace(/\./g, '/');
        return window.origin + '/admin/' + url;
    }
});