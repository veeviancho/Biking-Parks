create table customers
( customer_id int unsigned not null auto_increment primary key,
  customer_ic char(9) not null,
  customer_name char(50) not null,
  customer_email char(100) not null,
  customer_password char(100) not null
);

create table bicycles
( bike_id int unsigned not null auto_increment primary key,
  bike_name char(50) not null,
  bike_location char(100) not null,
  bike_type char(50) not null,
  rental_rate float unsigned not null,
  rating int unsigned,
  reward_points int unsigned
);

create table bookings
( booking_id int unsigned not null auto_increment primary key,
  booked_date date not null,
  customer_rating int unsigned,
  bike_id int unsigned not null,
  customer_id int unsigned not null
);