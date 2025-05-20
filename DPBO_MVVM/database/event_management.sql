CREATE DATABASE event_management;
USE event_management;

CREATE TABLE event (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(100) NOT NULL,
    event_date DATE NOT NULL
);

CREATE TABLE venue (
    id INT AUTO_INCREMENT PRIMARY KEY,
    venue_name VARCHAR(100) NOT NULL,
    location VARCHAR(150) NOT NULL
);

CREATE TABLE ticket (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT NOT NULL,
    venue_id INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (event_id) REFERENCES event(id),
    FOREIGN KEY (venue_id) REFERENCES venue(id)
);

-- Insert data event
INSERT INTO event (event_name, event_date) VALUES
('NIKI Concert', '2025-07-10'),
('KESHI Live', '2025-07-12'),
('YOASOBI Show', '2025-07-15'),
('ENHYPEN Tour', '2025-07-18'),
('OK ONE ROCK Gig', '2025-07-20'),
('Mosawo Performance', '2025-07-22'),
('HIVI! Concert', '2025-07-25'),
('One Direction Reunion', '2025-07-28'),
('Afgan Live', '2025-07-30'),
('Tulus Acoustic Night', '2025-08-02');

-- Insert data venue
INSERT INTO venue (venue_name, location) VALUES
('Stadion Utama', 'Jakarta'),
('Aula Kampus', 'Bandung'),
('Gedung Serbaguna', 'Surabaya'),
('Lapangan Terbuka', 'Yogyakarta'),
('Teater Nasional', 'Jakarta');

-- Insert data ticket
INSERT INTO ticket (event_id, venue_id, price) VALUES
(1, 1, 500000.00),
(2, 2, 350000.00),
(3, 3, 400000.00),
(4, 1, 550000.00),
(5, 4, 300000.00),
(6, 2, 320000.00),
(7, 5, 450000.00),
(8, 1, 600000.00),
(9, 3, 380000.00),
(10, 4, 400000.00);
