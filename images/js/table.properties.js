
/*
 * Editor client script for DB table properties
 * Created by http://editor.datatables.net/generator
 */

(function($){

$(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		ajax: 'php/table.properties.php',
		table: '#properties',
		fields: [
			{
				"label": "property name:",
				"name": "property_name"
			},
			{
				"label": "property price:",
				"name": "property_price"
			},
			{
				"label": "parking slots:",
				"name": "parking_slots"
			},
			{
				"label": "floor location:",
				"name": "floor_location"
			},
			{
				"label": "location_id:",
				"name": "location_id",
				"type": "select",
				"def": "loc1",
				"options": [
					"loc1",
					"loc2",
					"loc3",
					"loc4",
					"loc5",
					"loc6",
					"loc7",
					"loc8",
					"loc9",
					"loc10"
				]
			},
			{
				"label": "bedrooms:",
				"name": "bedrooms",
				"def": "1"
			},
			{
				"label": "bathrooms:",
				"name": "bathrooms"
			},
			{
				"label": "living area size:",
				"name": "living_area_size"
			},
			{
				"label": "gallery id:",
				"name": "gallery_id"
			},
			{
				"label": "type_id:",
				"name": "type_id",
				"type": "select",
				"options": [
					"type1",
					"type2",
					"type3",
					"type4",
					"type5",
					"type6",
					"type7"
				]
			},
			{
				"label": "forWhat_id:",
				"name": "forwhat_id",
				"type": "select",
				"options": [
					"for sale",
					"to rent "
				]
			}
		]
	} );

	var table = $('#properties').DataTable( {
		dom: 'Bfrtip',
		ajax: 'php/table.properties.php',
		columns: [
			{
				"data": "property_name"
			},
			{
				"data": "property_price"
			},
			{
				"data": "parking_slots"
			},
			{
				"data": "floor_location"
			},
			{
				"data": "time_uploaded"
			},
			{
				"data": "location_id"
			},
			{
				"data": "bedrooms"
			},
			{
				"data": "bathrooms"
			},
			{
				"data": "living_area_size"
			},
			{
				"data": "gallery_id"
			},
			{
				"data": "type_id"
			},
			{
				"data": "forwhat_id"
			}
		],
		select: true,
		lengthChange: false,
		buttons: [
			{ extend: 'create', editor: editor },
			{ extend: 'edit',   editor: editor },
			{ extend: 'remove', editor: editor }
		]
	} );
} );

}(jQuery));

