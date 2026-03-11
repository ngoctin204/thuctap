CREATE TABLE rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_name VARCHAR(100),
    type VARCHAR(50),
    base_price INT,
    capacity INT
);
CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_id INT,
    booking_date DATE,
    price INT,
    quantity INT
);
CREATE TABLE predictions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE,
    demand_level VARCHAR(50),
    suggested_price INT
);