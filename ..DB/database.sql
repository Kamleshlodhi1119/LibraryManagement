-- Create the database
CREATE DATABASE IF NOT EXISTS library_db;
USE library_db;

-- Table for Admin
CREATE TABLE IF NOT EXISTS librarian (
  
  username VARCHAR(20) NOT NULL,
  password CHAR(40) NOT NULL,
  email VARCHAR(255) NOT NULL
);

-- Table for User
CREATE TABLE IF NOT EXISTS member (
  
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

-- Table for Book Issue Log
CREATE TABLE IF NOT EXISTS books_issue_log (
  
  member_id INT(11) NOT NULL,
  book_isbn CHAR(13) NOT NULL,
  due_date DATE NOT NULL,
  return_date DATE,
  FOREIGN KEY (member_id) REFERENCES member (id),
  FOREIGN KEY (book_isbn) REFERENCES books (isbn)
);

-- Table for Pending Registration
CREATE TABLE IF NOT EXISTS pending_registration (
  
  username VARCHAR(20) NOT NULL,
  password CHAR(40) NOT NULL,
  email VARCHAR(80) NOT NULL,
  balance INT(4) NOT NULL
);
