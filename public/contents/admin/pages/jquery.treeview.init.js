/*
 Template: Metrica - Bootstrap 4 Admin Dashboard
 Author: Mannatthemes
 File: Treeview
 */

$(function () {
	"use strict";

	// Default
	$('#jstree').jstree();
	
	//Check Box
	$('#jstree-checkbox')
		.on("changed.jstree", function (e, data) {
			if(data.selected.length) {

				var url = data.node.a_attr.href;

	        	Pace.restart();
		        Pace.track(function () {

		            $.ajax({
		                url: url,
		                type: "GET",
		                dataType: "HTML",
		                success(data) {
		                    $('.category-form').html(data);
		                },
		                error(error) {
		                    Swal.fire(
		                        'Ops!',
		                        error.statusText,
		                        'error',
		                    );
		                }
		            });
		        });
			}
		})
		.jstree({
			"checkbox" : {
				"keep_selected_style" : false
			},
			"plugins" : [ "checkbox"],
			'core' : {
				'data' : {   
					"state" : { "opened" : true },
					"url": window.origin + '/admin/category',
				}
			}
	});
});