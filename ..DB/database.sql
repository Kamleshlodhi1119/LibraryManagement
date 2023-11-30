-- Create the database
CREATE DATABASE IF NOT EXISTS library_db;
USE library_db;

-- Table for Admin
CREATE TABLE IF NOT EXISTS librarian (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(20) NOT NULL,
  password CHAR(40) NOT NULL
);

-- Table for User
CREATE TABLE IF NOT EXISTS member (
  id INT AUTO_INCREMENT PRIMARY KEY,
  Username VARCHAR(20) NOT NULL,
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

-- Table for Author
CREATE TABLE IF NOT EXISTS author (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(80) NOT NULL
);

-- Table for Category
CREATE TABLE IF NOT EXISTS category (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(80) NOT NULL
);

-- Table for Book Issue Log
CREATE TABLE IF NOT EXISTS books_issue_log (
  issue_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  member_id INT(11) NOT NULL,
  book_isbn CHAR(13) NOT NULL,
  due_date DATE NOT NULL,
  return_date DATE,
  FOREIGN KEY (member_id) REFERENCES member (id),
  FOREIGN KEY (book_isbn) REFERENCES book (isbn)
);


-- 
CREATE TABLE IF NOT EXISTS pending_registration (
  request_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(20) NOT NULL,
  password CHAR(40) NOT NULL,
  email VARCHAR(80) NOT NULL,
  balance INT(4) NOT NULL
);


CREATE TABLE IF NOT EXISTS pending_books (
  isbn CHAR(13) NOT NULL PRIMARY KEY,
  title VARCHAR(80) NOT NULL,
  author VARCHAR(80) NOT NULL,
  category VARCHAR(80) NOT NULL,
  price INT(4) UNSIGNED NOT NULL
);
