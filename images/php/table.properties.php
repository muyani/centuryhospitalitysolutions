<?php

/*
 * Editor server script for DB table properties
 * Created by http://editor.datatables.net/generator
 */

// DataTables PHP library and database connection
include( "lib/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate;

// The following statement can be removed after the first run (i.e. the database
// table has been created). It is a good idea to do this to help improve
// performance.
$db->sql( "CREATE TABLE IF NOT EXISTS `properties` (
	`property_id` int(10) NOT NULL auto_increment,
	`property_name` varchar(255),
	`property_price` numeric(9,2),
	`parking_slots` numeric(9,2),
	`floor_location` numeric(9,2),
	`time_uploaded` datetime,
	`location_id` varchar(255),
	`bedrooms` numeric(9,2),
	`bathrooms` numeric(9,2),
	`living_area_size` varchar(255),
	`gallery_id` numeric(9,2),
	`type_id` varchar(255),
	`forwhat_id` varchar(255),
	PRIMARY KEY( `property_id` )
);" );

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'properties', 'property_id' )
	->fields(
		Field::inst( 'property_name' )
			->validator( 'Validate::notEmpty' )
			->validator( 'Validate::unique' ),
		Field::inst( 'property_price' )
			->validator( 'Validate::notEmpty' )
			->validator( 'Validate::numeric' ),
		Field::inst( 'parking_slots' ),
		Field::inst( 'floor_location' )
			->validator( 'Validate::maxNum', array( 'max'=>50 ) ),
		Field::inst( 'time_uploaded' )
			->set( false )
			->validator( 'Validate::notEmpty' )
			->validator( 'Validate::dateFormat', array( 'format'=>'Y-m-d H:i:s' ) )
			->getFormatter( 'Format::datetime', array( 'from'=>'Y-m-d H:i:s', 'to'  =>'Y-m-d H:i:s' ) )
			->setFormatter( 'Format::datetime', array( 'to'  =>'Y-m-d H:i:s', 'from'=>'Y-m-d H:i:s' ) ),
		Field::inst( 'location_id' )
			->validator( 'Validate::notEmpty' ),
		Field::inst( 'bedrooms' )
			->validator( 'Validate::notEmpty' )
			->validator( 'Validate::numeric' ),
		Field::inst( 'bathrooms' )
			->validator( 'Validate::notEmpty' ),
		Field::inst( 'living_area_size' )
			->validator( 'Validate::notEmpty' ),
		Field::inst( 'gallery_id' )
			->validator( 'Validate::notEmpty' )
			->validator( 'Validate::numeric' ),
		Field::inst( 'type_id' ),
		Field::inst( 'forwhat_id' )
	)
	->process( $_POST )
	->json();
