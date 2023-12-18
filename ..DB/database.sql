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


-- -- Sample Admin data
-- INSERT INTO librarian (username, password, email) VALUES
-- ('admin1', 'admin1password', 'admin1@example.com'),
-- ('admin2', 'admin2password', 'admin2@example.com');


-- -- Sample User data
-- INSERT INTO member (Username, password, name, email, balance, address) VALUES
-- ('user1', 'user1password', 'User One', 'user1@example.com', 100, '123 Main St'),
-- ('user2', 'user2password', 'User Two', 'user2@example.com', 50, '456 Oak St'),
-- ('user3', 'user3password', 'User Three', 'user3@example.com', 75, '789 Pine St'),
-- ('user4', 'user4password', 'User Four', 'user4@example.com', 120, '101 Elm St'),
-- ('user5', 'user5password', 'User Five', 'user5@example.com', 90, '202 Maple St');
-- -- Sample Book data
-- INSERT INTO books (isbn, title, author, category, price, copies) VALUES
-- ('9780135163837', 'Clean Code', 'Robert C. Martin', 'Programming', 30, 20),
-- ('9781449331818', 'The Pragmatic Programmer', 'Andrew Hunt, David Thomas', 'Programming', 25, 15),
-- ('9780596007126', 'Head First Design Patterns', 'Eric Freeman, Elisabeth Robson', 'Programming', 40, 10),
-- ('9780132350884', 'The Mythical Man-Month', 'Frederick P. Brooks Jr.', 'Software Engineering', 20, 25),
-- ('9780201835953', 'Design Patterns', 'Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides', 'Programming', 35, 18),
-- ('9781593275846', 'Python Crash Course', 'Eric Matthes', 'Programming', 28, 30),
-- ('9781617294136', 'Deep Learning with Python', 'François Chollet', 'Artificial Intelligence', 45, 12),
-- ('9780596517748', 'Learning Python', 'Mark Lutz', 'Programming', 32, 22),
-- ('9780135957059', 'Refactoring', 'Martin Fowler', 'Programming', 38, 15),
-- ('9780201633610', 'Code Complete', 'Steve McConnell', 'Programming', 42, 17),
-- ('9780262033848', 'Introduction to Algorithms', 'Thomas H. Cormen, Charles E. Leiserson, Ronald L. Rivest, Clifford Stein', 'Algorithms', 50, 8),
-- ('9780321125217', 'Head First Java', 'Kathy Sierra, Bert Bates', 'Programming', 36, 20),
-- ('9780134685991', 'Cracking the Coding Interview', 'Gayle Laakmann McDowell', 'Programming', 28, 25),
-- ('9781789958135', 'Hands-On Machine Learning with Scikit-Learn, Keras, and TensorFlow', 'Aurélien Géron', 'Machine Learning', 48, 15);

-- INSERT INTO books_issue_log (Username, isbn, due_date, return_date) VALUES
-- ('user1', '9780135163837', '2023-01-15', '2023-02-05'),
-- ('user2', '9781449331818', '2023-02-10', NULL),
-- ('user3', '9780596007126', '2023-03-20', NULL);

-- -- Sample Pending Books Requests data
-- INSERT INTO pending_books_requests (isbn, Username) VALUES
-- ('9780201835953', 'user4'),
-- ('9781617294136', 'user5'),
-- ('9780134685991', 'user2');
