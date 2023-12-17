-- Create the database
CREATE DATABASE IF NOT EXISTS library_db;
USE library_db;

-- Table for Admin
CREATE TABLE IF NOT EXISTS librarian (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(20) NOT NULL,
  password CHAR(40) NOT NULL,
  email VARCHAR(255) NOT NULL
);


-- Table for User
CREATE TABLE IF NOT EXISTS member (
  Username VARCHAR(20) PRIMARY KEY,
  password CHAR(40) NOT NULL,
  name VARCHAR(80) NOT NULL,
  email VARCHAR(80) NOT NULL,
  balance INT(4) NOT NULL,
  address VARCHAR(255) DEFAULT 'N/A'
);


-- Table for Book
CREATE TABLE IF NOT EXISTS books (
  isbn CHAR(13) NOT NULL PRIMARY KEY,
  title VARCHAR(80) NOT NULL,
  author VARCHAR(80) NOT NULL,
  category VARCHAR(80) NOT NULL,
  price INT(4) UNSIGNED NOT NULL,
  copies INT(10) UNSIGNED NOT NULL
);



-- Table for Book Issue Log
CREATE TABLE IF NOT EXISTS books_issue_log (
  Uername char(255) NOT NULL,
  isbn CHAR(13) NOT NULL,
  due_date DATE NOT NULL,
  return_date DATE
);

CREATE TABLE IF NOT EXISTS pending_books_requests (
  isbn CHAR(13) NOT NULL ,
  Username VARCHAR(80) NOT NULL,
  time DATE DEFAULT CURRENT_TIMESTAMP
  
);
