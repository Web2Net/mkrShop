$(document).ready(function() {

	$("#device_dropdown").change(function() {
		var device_value = $("#device_dropdown option:selected").val();
		if (device_value == '') {clearlist();}

		get_brand();
	})
	$("#brand_dropdown").change(function() {
		get_model();
	})
}

);

function get_brand() {
	var device_value = $("#device_dropdown option:selected").val();
	var brand = $("#brand_dropdown");

	if (device_value == 0) {
		brand.attr("disabled",true);
		get_model();
	} else {

		brand.attr("disabled",false);
		brand.load('/cms/bybyby/tpl/get_brand.php',{device : device_value});
	}
	
}
function get_model() {
	var device_value = $("#device_dropdown option:selected").val();
	var brand_value = $("#brand_dropdown option:selected").val();
	var model = $("#model_dropdown");
	if (device_value == 0) {
		model.attr("disabled",true);
	} else {
		model.attr("disabled",false);
		model.load('/cms/bybyby/tpl/get_model.php',{brand : brand_value});
	}
}
function clearlist() {
	$("#brand_dropdown").empty();
	$("#model_dropdown").empty();
}