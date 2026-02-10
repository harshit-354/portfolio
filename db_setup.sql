-- =============================================
-- Portfolio Database Setup
-- Run: mysql -u root -p < db_setup.sql
-- =============================================

CREATE DATABASE IF NOT EXISTS portfolio_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE portfolio_db;

-- Contact form submissions
CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    is_read TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Projects
CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    description TEXT NOT NULL,
    tags VARCHAR(500) DEFAULT '',
    link VARCHAR(500) DEFAULT '',
    github_url VARCHAR(500) DEFAULT '',
    image_url VARCHAR(500) DEFAULT '',
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Skills
CREATE TABLE IF NOT EXISTS skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    icon_class VARCHAR(100) DEFAULT 'fas fa-code',
    category ENUM('language', 'frontend', 'backend', 'tools', 'other') DEFAULT 'other',
    proficiency_level INT DEFAULT 50,
    display_order INT DEFAULT 0
) ENGINE=InnoDB;

-- Education
CREATE TABLE IF NOT EXISTS education (
    id INT AUTO_INCREMENT PRIMARY KEY,
    institution VARCHAR(255) NOT NULL,
    degree VARCHAR(255) NOT NULL,
    year_range VARCHAR(50) NOT NULL,
    description TEXT,
    display_order INT DEFAULT 0
) ENGINE=InnoDB;

-- Admin users
CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- =============================================
-- SEED DATA
-- =============================================

-- Default admin (username: admin, password: admin123)
INSERT INTO admin_users (username, password_hash) VALUES
('admin', '$2y$10$YWJhY2FkYWJyYTEyMzQ1Njc4OTAxMjM0NTY3ODkwMTIzNDU2Nzg');

-- Seed projects
INSERT INTO projects (title, description, tags, link, github_url, display_order) VALUES
('Portfolio Website', 'A modern, responsive portfolio website with PHP backend, contact form with database storage, and admin panel.', 'HTML,CSS,JavaScript,PHP,MySQL', '#', '#', 1),
('Task Manager App', 'A full-stack task management application with user authentication, CRUD operations, and clean UI.', 'Java,MySQL,REST API', '#', '#', 2),
('AI Chatbot', 'An intelligent chatbot built with Python using NLP techniques for natural conversation.', 'Python,NLP,Machine Learning', '#', '#', 3);

-- Seed skills
INSERT INTO skills (name, icon_class, category, proficiency_level, display_order) VALUES
('C', 'fab fa-cuttlefish', 'language', 85, 1),
('C++', 'fas fa-code', 'language', 80, 2),
('Java', 'fab fa-java', 'language', 75, 3),
('Python', 'fab fa-python', 'language', 80, 4),
('HTML5', 'fab fa-html5', 'frontend', 90, 5),
('CSS3', 'fab fa-css3-alt', 'frontend', 85, 6),
('JavaScript', 'fab fa-js-square', 'frontend', 80, 7),
('PHP', 'fab fa-php', 'backend', 70, 8),
('MySQL', 'fas fa-database', 'backend', 75, 9),
('Git', 'fab fa-git-alt', 'tools', 80, 10),
('GitHub', 'fab fa-github', 'tools', 85, 11),
('Linux', 'fab fa-linux', 'tools', 70, 12);

-- Seed education
INSERT INTO education (institution, degree, year_range, description, display_order) VALUES
('University', 'B.Tech in Computer Science & Engineering', '2023 — Present', 'Pursuing a degree in Computer Science with focus on DSA, Web Development, and AI. Enrollment: 23FE10CDS00003', 1),
('Senior Secondary School', 'Higher Secondary (12th)', '2021 — 2023', 'Completed senior secondary education with Science (PCM) and Computer Science.', 2);
