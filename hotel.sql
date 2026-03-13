-- XÓA BẢNG CŨ (tránh lỗi tồn tại bảng)
DROP TABLE IF EXISTS booking_services;
DROP TABLE IF EXISTS payments;
DROP TABLE IF EXISTS bookings;
DROP TABLE IF EXISTS reviews;
DROP TABLE IF EXISTS rooms;
DROP TABLE IF EXISTS room_types;
DROP TABLE IF EXISTS services;
DROP TABLE IF EXISTS contacts;
DROP TABLE IF EXISTS predictions;
DROP TABLE IF EXISTS users;

-- USERS
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    phone VARCHAR(20),
    role VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ROOM TYPES
CREATE TABLE room_types (
    type_id INT AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(100),
    description TEXT,
    price DECIMAL(10,2)
) ENGINE=InnoDB;

-- ROOMS
CREATE TABLE rooms (
    room_id INT AUTO_INCREMENT PRIMARY KEY,
    room_name VARCHAR(100),
    type_id INT,
    base_price DECIMAL(10,2),
    capacity INT,
    status VARCHAR(20) DEFAULT 'available',
    FOREIGN KEY (type_id) REFERENCES room_types(type_id)
) ENGINE=InnoDB;

-- BOOKINGS
CREATE TABLE bookings (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    room_id INT,
    booking_date DATE,
    check_in DATE,
    check_out DATE,
    price DECIMAL(10,2),
    quantity INT,
    status VARCHAR(20) DEFAULT 'pending',
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (room_id) REFERENCES rooms(room_id)
) ENGINE=InnoDB;

-- PAYMENTS
CREATE TABLE payments (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT,
    payment_method VARCHAR(50),
    amount DECIMAL(10,2),
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(20),
    FOREIGN KEY (booking_id) REFERENCES bookings(booking_id)
) ENGINE=InnoDB;

-- SERVICES
CREATE TABLE services (
    service_id INT AUTO_INCREMENT PRIMARY KEY,
    service_name VARCHAR(100),
    price DECIMAL(10,2),
    description TEXT
) ENGINE=InnoDB;

-- BOOKING SERVICES
CREATE TABLE booking_services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT,
    service_id INT,
    quantity INT,
    FOREIGN KEY (booking_id) REFERENCES bookings(booking_id),
    FOREIGN KEY (service_id) REFERENCES services(service_id)
) ENGINE=InnoDB;

-- REVIEWS
CREATE TABLE reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    room_id INT,
    rating INT,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (room_id) REFERENCES rooms(room_id)
) ENGINE=InnoDB;

-- CONTACTS
CREATE TABLE contacts (
    contact_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- DEMAND PREDICTION
CREATE TABLE predictions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE,
    demand_level VARCHAR(50),
    suggested_price DECIMAL(10,2)
) ENGINE=InnoDB;