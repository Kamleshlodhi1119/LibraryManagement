# LibraryManagement


 
 
 
 
 
Abstract: 
 
The Simple Online Library Management System is a computerized solution designed to simplify the organization and management of library-related tasks. The system provides an abstracted interface for users and administrators, reducing the complexity of manual processes. Through this abstraction, the system streamlines book management, user interactions, and administrative tasks. This simplicity enhances the overall efficiency of the library, making it easier to handle book requests, returns, and other essential functions. The Online Library Management System aims to minimize manual effort, enhance accuracy, and improve the overall user experience in a library setting. 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
CHAPTER 1 
INTRODUCTION 
 
 
  
This chapter gives an overview about the aim , objectives ,background and operation environment of the system. 
 
 
1.1 PROJECT AIMS AND OBJECTIVES 
 
The project aims and objectives that will be achieved after completion of this project are  discussed in this subchapter. The aims and objectives are as follows: 
•	A search column to search availability of books.
•	An Admin login page where admin can add books, videos or page sources 
•	An Admin login page where the Admin can issue the books and return a book to the library
•	An Student login  Student see their profile.
•	An Student see their  issue books and pending request for books.
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
1.2 BACKGROUND OF PROJECT 
 
Library Management System is an application which refers to library systems which are generally small or medium in size. It is used by librarian to manage the library using a computerized system where he/she can add new books, member and delete a user. 
 
Books and student maintenance modules are also included in this system which would keep track of the students using the library and also a detailed description about the books a library contains. With this computerized system there will be no loss of book record or member record which generally happens when a non-computerized system is used. 
 
All these modules are able to help librarian to manage the library with more convenience and in a more efficient way as compared to library systems which are not computerized. 
 
 
 
 
 
 
 
PROCESSOR 
 
 	INTEL CORE PROCESSOR OR BETTER 
PERFORMANCE 
 
OPERATING 
SYSTEM 
 	WINDOWS 7, 8, 10 AND 11UBUNTU 
 
MEMORY 
 	1GB RAM OR MORE 
 
HARD DISK SPACE 
 
 	
MINIMUM 3 GB FOR DATABASE USAGE FOR FUTURE 
 
DATABASE 	MY SQL 
 
 
 
 
 
 
 
 
 
 
 





CHAPTER 2 
 
 
SYSTEM ANALYSIS 
 
 
 
In this chapter, we will discuss and analysed about the developing process of Library Management System including software requirement specification (SRS) and comparison between existing and proposed system . The functional and non-functional requirements are included in SRS part to provide complete description and overview of system requirement before the developing process is carried out. Besides that, existing vs proposed provides a view of how the proposed system will be more efficient than the existing one. 
 
 
 
 
 
	2.1 	SOFTWARE REQUIREMENT SPECIFICATION 
2.1.1 GENERAL DESCRIPTION 
 
 
PRODUCT DESCRIPTION: 
 
Library Management System is a computerized system which helps 
 user(librarian) to manage the library daily activity in electronic format. It reduces 
 the risk of paper work such as file lost, file damaged and time consuming. 
 
It can help user to manage the transaction or record more effectively and time- 
 saving. 
 
 
PROBLEM STATEMENT: 
 
The problem occurred before having computerized system includes: 
 
•	File lost:
When computerized system is not implemented file is always lost because of human environment. Sometimes due to some human error there may be a loss of records.


•	File damaged :
 			When a computerized system is not their file is always lost due to                        some accident like spilling of water by some member on file accidentally. 
Besides some natural disaster like floods or fires may also damage the files. 
 
•	Difficult to search record:
 		When there is no computerized system there is always a difficulty in searching of records if the records are large in number .

•	Space consuming:
After the number of records become large the space for physical storage of file and records also increases if no computerized system is implemented.

•	Cost consuming
As there is no computerized system the to add each record paper will be needed which will increase the cost for the management of library.
 
2.1.2 SYSTEM OBJECTIVES 
 
•	Improvement in control and performance
	The system is developed to cope up with the current issues and problems of library .The system can add user, validate user and is also bug free.
•	Save cost
After computerized system is implemented less human force will be required to maintain the library thus reducing the overall cost.

•	Save time
Librarian is able to search record by using few clicks of mouse and few search keywords thus saving his valuable time.

•	Option of online Notice board
Librarian will be able to provide a detailed description of workshops going in the college as well as in nearby colleges

•	Lecture Notes
Teacher have a facility to upload lectures notes in a pdf file having size not more than 10mb
 
 
 
 
 
 
2.1.3 SYSTEM REQUIREMENTS 
 
2.1.3.1 NON FUNCTIONAL REQUIREMENTS 
 
	Product Requirements
	EFFICIENCY REQUIREMENT
When a library management system will be implemented librarian and user will easily acess library as searching and book transaction will be very faster .
 
 
RELIABILITY REQUIREMENT 
 
The system should accurately performs member registration ,member validation , report generation and search 
 
 
USABILITY REQUIREMENT 
 
The system is designed for a user-friendly environment so that student and staff of library can perform the various tasks easily and in an effective way. 
 
 
ORGANIZATIONAL REQUIREMENT IMPLEMENTATION REQUIREMNTS 
 
 
In implementing whole system, it uses html in front end with php as server side scripting language which will be used for database connectivity and the backend ie the database part is developed using mysql. 
 
 
DELIVERY REQUIREMENTS 
 
The whole system is expected to be delivered in six months of time with a weekly evaluation by the project guide. 
 
 
 
 
 
 
2.1.3.2 FUNCTIONAL REQUIREMENTS 
 
1.	NORMAL USER 
 
 
1.1 USER LOGIN 
 
Description of feature 
 
This feature used by the user to login into system. They are required to enter user email and password before they are allowed to enter the system .The user id and password will be verified and if invalid id is there user is allowed to not enter the system. 
 
 
 
 
Functional requirements 
 
-	user id is provided when they register 

-	The system must only allow user with valid id and password to enter the system 

-	The system performs authorization process which decides what user level can acess to. 

-	The user must be able to logout after they finished using system. 

-	The user must be submitting the Security fee for books.
 
 
1.2 REGISTER NEW USER 
 
Description of feature 
 
This feature can be performed by Admin to register new user to create account. 
 
 
Functional requirements 
 
-System must be able to verify information 
 
-System must be able to delete information if information is wrong 
 
 
1.3 REGISTER NEW BOOK 
 
Description of feature 
 
This feature allows to add new books to the library 
 
Functional requirements 
 
-System must be able to verify information 
-System must be able to enter number of copies into table. 
-System must be able to not allow two books having same book id. 
 
1.5 SEARCH BOOK 
 
 
 
DESCRIPTION OF FEATURE 
This feature is found in book maintenance part . we can search book based on book id , book name , publication or by author name. 
 
 
Functional requirements 
 
-	System must be able to search the database based on select search type 
 
 
-	System must be able to filter book based on keyword enterd 
 
 
-	System must be able to show the filtered book in table view 
 
 
Functional requirements 
 
-System should be able to add detailed information about events . 
 
-System should be able to display information on notice board available in the homepage of site 
 
 
2.1.4 SOFTWARE AND HARDWARE REQUIREMENTS 
 
This section describes the software and hardware requirements of the system 
2.1.4.1 SOFTWARE REQUIREMENTS 
 
•	Operating system- Windows 11 is used as the operating system as it is stable and supports more features and is more user friendly

•	Database MYSQL-MYSQL is used as database as it easy to maintain and retrieve records by simple queries which are in English language which are easy to understand and easy to write.

•	Development tools and Programming language- HTML is used to write the whole code and develop webpages with css, java script for styling work and php for sever side scripting.
 
 
 
 
 
