-- 
-- Editor SQL for DB table properties
-- Created by http://editor.datatables.net/generator
-- 

CREATE TABLE IF NOT EXISTS `properties` (
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
);