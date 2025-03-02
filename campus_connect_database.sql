-- Create the database
CREATE DATABASE IF NOT EXISTS campus_connect;
USE campus_connect;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    role ENUM('student', 'faculty') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create admins table
CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create notices table
CREATE TABLE IF NOT EXISTS notices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    date DATETIME NOT NULL,
    posted_by INT NOT NULL,
    notice_type ENUM('official', 'unofficial') NOT NULL,
    FOREIGN KEY (posted_by) REFERENCES users(id) ON DELETE CASCADE
);

-- Create lost_found table
CREATE TABLE IF NOT EXISTS lost_found (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    date DATETIME NOT NULL,
    posted_by INT NOT NULL,
    contact VARCHAR(100) NOT NULL,
    item_status ENUM('lost', 'found') NOT NULL,
    FOREIGN KEY (posted_by) REFERENCES users(id) ON DELETE CASCADE
);

-- Create indexes for better performance
CREATE INDEX idx_users_email ON users(email);
CREATE INDEX idx_admins_email ON admins(email);
CREATE INDEX idx_notices_date ON notices(date);
CREATE INDEX idx_lost_found_date ON lost_found(date);

-- Insert sample data

-- Sample users
INSERT INTO users (name, email, password, phone, role) VALUES
('John Doe', 'john@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1234567890', 'student'),
('Jane Smith', 'jane@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9876543210', 'faculty');

-- Sample admin
INSERT INTO admins (name, email, password, role) VALUES
('Admin User', 'admin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'super_admin');

-- Sample notices
INSERT INTO notices (title, content, date, posted_by, notice_type) VALUES
('Welcome to the new semester', 'We hope you have a great start to the new academic year!', NOW(), 1, 'official'),
('Club meeting tomorrow', 'Don''t forget about the chess club meeting tomorrow at 5 PM in Room 101.', NOW(), 2, 'unofficial');

-- Sample lost & found items
INSERT INTO lost_found (item_name, description, date, posted_by, contact, item_status) VALUES
('Blue Backpack', 'Found a blue backpack near the library. It has a math textbook inside.', NOW(), 1, 'john@example.com', 'found'),
('Gold Watch', 'Lost my gold watch in the cafeteria. It has sentimental value.', NOW(), 2, '9876543210', 'lost');

