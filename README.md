# LibraryManagement







ABSTRACT: 
 
The Simple Online Library Management System is a computerized solution designed to simplify the organization and management of library-related tasks. The system provides an abstracted interface for users and administrators, reducing the complexity of manual processes. Through this abstraction, the system streamlines book management, user interactions, and administrative tasks. This simplicity enhances the overall efficiency of the library, making it easier to handle book requests, returns, and other essential functions. The Online Library Management System aims to minimize manual effort, enhance accuracy, and improve the overall user experience in a library setting. 
 
 
 
 
 
 
 
 
CHAPTER 1
INTRODUCTION

This chapter gives an overview about the aim , objectives ,background and operation environment of the system. 

1.1.	 PROJECT AIMS AND OBJECTIVES 
 
The project aims and objectives that will be achieved after completion of this project are  discussed in this subchapter. The aims and objectives are as follows: 
•	A search column to search availability of books.
•	An Admin login page where admin can add books. 
•	An Admin login page where the Admin can issue the books and return a book to the library
•	An Student login  Student see their profile.
•	An Student see their  issue books and pending request for books.


1.2.  BACKGROUND OF PROJECT 

Library Management System is an application which refers to library systems which are generally small or medium in size. It is used by librarian to manage the library using a computerized system where he/she can add new books, member and delete a user. 



CONTENT	SPECIFICATIONS
PROCESSOR
	INTEL CORE PROCESSOR OR BETTER
PERFORMANCE
OPERATING  SYSTEM	WINDOWS 7, 8, 10 AND 11UBUNTU
MEMORY	1GB RAM OR MORE
HARD DISK SPACE	MINIMUM 3 GB FOR DATABASE USAGE FOR FUTURE
DATABASE	MY SQL

Books and student maintenance modules are also included in this system which would keep track of the students using the library and also a detailed description about the books a library contains. With this computerized system there will be no loss of book record or member record which generally happens when a non-computerized system is used. All these modules are able to help librarian to manage the library with more convenience and in a more efficient way as compared to library systems which are not computerized. 
 
 
 
 
 














CHAPTER 2
SYSTEM ANALYSIS

In this chapter, we will discuss and analysed about the developing process of Library Management System including software requirement specification (SRS) and comparison between existing and proposed system . The functional and non-functional requirements are included in SRS part to provide complete description and overview of system requirement before the developing process is carried out. Besides that, existing vs proposed provides a view of how the proposed system will be more efficient than the existing one. 


2.1 	SOFTWARE REQUIREMENT SPECIFICATION 
 	      

2.1.1 GENERAL DESCRIPTION 

PRODUCT DESCRIPTION: 
 
Library Management System is a computerized system which helps   user(librarian) to manage the library daily activity in electronic format. It reduces  the risk of paper work such as file lost, file damaged and time consuming. 
It can help user to manage the transaction or record more effectively and time- saving.

PROBLEM STATEMENT: 
 
The problem occurred before having computerized system includes:  

•	File lost:
		     When computerized system is not implemented file is always lost because of human environment. Sometimes due to some human error there may be a loss of records.
•	File damaged :
 			  When a computerized system is not their file is always lost due to some accident like spilling of water by some member on file accidentally. 
Besides some natural disaster like floods or fires may also damage the files. 
•	Difficult to search record:
 				       When there is no computerized system there is always a difficulty in searching of records if the records are large in number .
•	Space consuming:
			       After the number of records become large the space for physical storage of file and records also increases if no computerized system is implemented.
•	Cost consuming:
			     As there is no computerized system the to add each record paper will be needed which will increase the cost for the management of library.
 

2.1.2	SYSTEM OBJECTIVES 

•	Improvement in control and performance:
							The system is developed to cope up with the current issues and problems of library .The system can add user, validate user and is also bug free.
•	Save cost:
		      After computerized system is implemented less human force will be required to maintain the library thus reducing the overall cost.
•	Save time:
			Librarian is able to search record by using few clicks of mouse and few search keywords thus saving his valuable time.
•	Option of online Notice board:
					Librarian will be able to provide a detailed description of workshops going in the college as well as in nearby colleges
•	Lecture Notes:
			 Teacher have a facility to upload lectures notes in a pdf file having size not more than 10mb
 




2.1.3 SYSTEM REQUIREMENTS 
2.1.3.1 NON-FUNCTIONAL REQUIREMENTS 
	Product Requirements
•	EFFICIENCY REQUIREMENT
When a library management system will be implemented librarian and user will easily acess library as searching and book transaction will be very faster .
•	RELIABILITY REQUIREMENT 
 The system should accurately performs member registration ,member validation , report generation and search 
•	USABILITY REQUIREMENT 
 The system is designed for a user-friendly environment so that student and staff of library can perform the various tasks easily and in an effective way. 
•	ORGANIZATIONAL REQUIREMENT IMPLEMENTATION REQUIREMNTS  
In implementing whole system, it uses html in front end with php as server side scripting language which will be used for database connectivity and the backend ie the database part is developed using mysql. 
 
	DELIVERY REQUIREMENTS  
The whole system is expected to be delivered in six months of time with a weekly evaluation by the project guide. 


2.1.3.2 FUNCTIONAL REQUIREMENTS 
1.	NORMAL USER

1.1.	 USER LOGIN 

Description of feature 
This feature used by the user to login into system. They are required to enter user email and password before they are allowed to enter the system .The user id and password will be verified and if invalid id is there user is allowed to not enter the system. 


Functional requirements 
-	user id is provided when they register 
-	The system must only allow user with valid id and password to enter the system 
-	The system performs authorization process which decides what user level can access to. 
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

1.4 Functional requirements 
-	System must be able to verify information 
-	System must be able to enter number of copies into table. 
-	System must be able to not allow two books having same book id. 

1.5 SEARCH BOOK 

DESCRIPTION OF FEATURE 
This feature is found in book maintenance part . we can search book based on book id , book name , publication or by author name. 
Functional requirements:
-	System must be able to search the database based on select search type 
-	System must be able to filter book based on keyword enterd 
-	System must be able to show the filtered book in table view 

2.1.4 SOFTWARE AND HARDWARE REQUIREMENTS 
 
This section describes the software and hardware requirements of the system 
2.1.4.1 SOFTWARE REQUIREMENTS 
 
	Operating system- Windows 11 is used as the operating system as it is stable and supports more features and is more user friendly

	Database MYSQL-MYSQL is used as database as it easy to maintain and retrieve records by simple queries which are in English language which are easy to understand and easy to write.

	Development tools and Programming language- HTML is used to write the whole code and develop webpages with css, java script for styling work and php for sever side scripting.
 
2.1.4.2 HARDWARE REQUIREMENTS 
	generation is used as a processor because it is fast than other processors an provide reliable and stable and we can run our pc for longtime. By using this processor, we can keep on developing our project without any worries.

	Ram 1 GB is used as it will provide fast reading and writing capabilities and will in turn support in processing. 

2.1.	Existing System: 
	Early days Libraries are managed manually. It required lot of time to record or to retrieve the details. The employees who have to record the details must perform their job very carefully. Even a small mistake would create a lot of problems. Security of information is very less. Report generations of all the information is very tough task. 

	Maintenance of Library catalogue and arrangement of the books to the catalogue is very complex task. In addition to its maintenance of member details, issue dates and return dates etc. manually is a complex task. 

	All the operations must be performed in perfect manner for the maintenance of the library with out any degradation which may finally result in the failure of the entire system. 


2.2.	Proposed System: 

	To solve the inconveniences as mentioned in the existing system, an Online Library is proposed. The proposed system contains the following features: 
	The students will register them through Online 
	Individually each member will have his account through which he can access the information he needs. 
	Book details like authors, number of copies totally maintained by library, present available number of books, reference books, non-reference books etc. all this information can be made handy. 
	Regarding the members designation, number of books was issued. 
	Issue dates and returns of each member is maintained separately and fine charged if there is any delay in returning the book. 
	Administrator can add, update the books. 
	Time consuming is low, gives accurate results, reliability can be improved with the help of security. 
2.3.	SOFTWARE TOOLS USED 
       The whole Project is divided in two parts the front end and the back end. 
	
Front end :
	The front end is designed using of html , Php ,css, Java script  
	HTML- HTML or Hyper Text Markup Languages the main markup language for creating web pages and other information that can be displayed in a web browser.HTML is written in the form of HTML elements consisting of tags enclosed in angle brackets (like <html>), within the web page content. HTML tags most commonly come in pairs like <h1> and </h1>, although some tags represent empty elements and so are unpaired, for example <imp>. The first tag in a pair is the start tag, and the second tag is the end tag (they are also called opening tags and closing tags). In between these tags web designers can add text, further tags, comments and other types of text-based content. The purpose of a web browser is to read HTML documents and compose them into visible or audible web pages. The browser does not display the HTML tags, but uses the tags to interpret the content of the page.HTML elements form the building blocks of all websites. HTML allows images and objects to be embedded and can be used to create interactive forms. It provides a means to create structured documents by denoting structural semantics for text such as headings, paragraphs, lists, links, quotes and other items. It can embed scripts written in languages such as JavaScript which affect the behaviour of  HTML web pages. 

	CSS- Cascading Style Sheets(CSS) is a style sheet language used for describing   the look and formatting of a document written in a markup language. While most often used to style web pages and interfaces written in HTML and XHTML, the language can be applied to any kind  of XML document, including plain XML, SVG and XUL. CSS is a cornerstone specification of the web and almost all web pages use CSS style sheets to describe their presentation.CSS is designed primarily to enable the separation of document content from document presentation, including elements such as the layout, colours, and fonts. This separation can improve content accessibility, provide more flexibility and control in the specification of presentation characteristics, enable multiple pages to share formatting, and reduce complexity and repetition in the structural content (such as by allowing for table less web design).CSS can also allow the same markup page to be presented in different styles for different rendering methods, such as on-screen, in print, by voice (when read out by a speech-based browser or screen reader) and on Braille-based, tactile devices. It can also be used to allow the web page to display differently depending on the screen size or device on which it is being viewed. While the author of a document typically links that document to a CSS file, readers can use a different style sheet, perhaps one on their own computer, to override the one the author has specified. However if the author or the reader did not link the document to a specific style sheet the default style of the browser will be applied.CSS specifies a priority scheme to determine which style rules apply if more than one rule matches against a particular element. In this so-called cascade, priorities or weights are calculated and assigned to rules, so that the results are predictable. 

	JAVA SCRIPT- JavaScript(JS) is a dynamic computer programming language. It is most commonly used as part of web browsers, whose implementations allow client side scripts to interact with the user, control the browser, communicate asynchronously, and alter the document content that is displayed. It is also being used in server-side programming, game development and the creation of desktop and mobile applications. JavaScript is a prototype-based scripting language with dynamic typing and has first-class functions. Its syntax was influenced by C. JavaScript copies many names and naming conventions from Java, but the two languages are otherwise unrelated and have very different semantics. The key design principles within JavaScript are taken from the Self and Scheme programming languages. It is a multiparadigm language, supporting object-oriented, imperative,  and functional programming styles. The application of JavaScript to use outside of web pages—for example, in PDF documents, site-specific browsers, and desktop widgets—is also significant. Newer and faster JavaScript VMs and platforms built upon them (notably Node.js) have also increased the popularity of JavaScript for server-side web applications. On the client side, JavaScript was traditionally implemented as an interpreted language but just-in-time compilation is now performed by recent (post-2012) browsers. 

	PHP- PHP is a server-side scripting language designed for web-development but also used as a general-purpose programming language. PHP is now installed on more than 244 million websites and 2.1 million web servers. Originally created by Rasmus Lerdorf in 1995, the reference implementation of PHP is now produced by The PHP Group. While PHP originally stood for Personal Home Page, it now stands for PHP: Hypertext Preprocessor, a recursive backronym code is interpreted by a webserver with a PHP processor module, which generates the resulting web page: PHP commands can be embedded directly into an HTML source document rather than calling an external file to process data. It has also evolved to include a command-line interface capability and can be used  in standalone graphical applications. PHP is free software released under the PHP License. PHP can be deployed on most web servers and also as a standalone shell on almost every operating system and platform, free of charge. 


Backend:

	MYSQL- MySQL("My S-Q-L", officially, but also called "My Sequel") is (as of July 2013) the world's second most widely used open-source relational database management system (RDBMS). It is named after co-founder Michael Wideners daughter, My. The
SQL phrase stands for Structured Query Language. The MySQL development project  has made its source code available under the terms of the GNU General Public License, as well as under a variety of proprietary agreements. MySQL was owned and sponsored by a single for-profit firm, the Swedish company MySQL AB, now owned by Oracle Corporation .MySQL is a popular choice of database for use in web applications, and is a central component of the widely used LAMP open-source web application software stack (and other 'AMP' stacks). LAMP is an acronym for "Linux, Apache, MySQL, Perl/PHP/Python." Free-software-open-source projects that require a full-featured database management system often use MySQL. For commercial use, several paid editions are available, and offer additional functionality. Applications which use MySQL databases include: TYPO3, MODx, Joomla, WordPress, phpBB, MyBB, Drupal and other software. MySQL is also used in many high-profile, large-scale websites, including Wikipedia, Google (though not for searches), Facebook, Twitter, Flickr, and YouTube 
 
 





 
CHAPTER 3
SYSTEM ARCHITECTURE AND METHOLOGY


The architecture of the Simple Online Library Management System is designed with a combination of Front-End (client-side) and Back-End (server-side) technologies, following a three-tier architecture model. This architecture ensures a separation of concerns, making the system modular, scalable, and easy to maintain. The architecture chosen for this project is often referred to as the Three-Tier Architecture.
The methodology chosen for developing the Simple Online Library Management System is the Agile Software Development Life Cycle (SDLC). Agile is an iterative and incremental approach to software development that emphasizes flexibility, collaboration, and customer satisfaction. The Agile SDLC is well-suited for projects where requirements are expected to change, and continuous feedback and adaptation are crucial. The Agile methodology consists of several key principles and practices:

Three-Tier Architecture:
1. Presentation Tier (Front-End):
•	The presentation tier is responsible for user interaction and interface. It is implemented using HTML, CSS, and JavaScript.
•	HTML (HyperText Markup Language): Defines the structure of the web pages.
•	CSS (Cascading Style Sheets): Handles the styling and formatting of the HTML elements.
•	JavaScript: Provides client-side scripting for dynamic and interactive features.




2. Application Tier (Middle-End): 

•	The application tier, also known as the middle-end, is responsible for processing and business logic. It is implemented using PHP.
•	PHP (Hypertext Preprocessor): Used for server-side scripting to interact with the database, handle user authentication, and process business logic.
3. Data Tier (Back-End):
•	The data tier is responsible for data storage and management. It is implemented using the MySQL database.
•	MySQL Database: A relational database management system (RDBMS) that stores structured data in tables.
Key Components:
1. Front-End Components:
•	HTML Pages: Structure the content and layout of the user interface.
•	CSS Stylesheets: Provide styling and formatting for a visually appealing interface.
•	JavaScript Code: Enhances user interaction and provides dynamic content.
2. Middle-End Component:
•	PHP Scripts: Handle server-side logic, process user requests, and interact with the MySQL database.
3. Back-End Component:
•	MySQL Database: Stores and manages data related to users, books, and library functions.

Benefits of Three-Tier Architecture:
1.	Modularity: Each tier can be developed, modified, and maintained independently, making the system modular.
2.	Scalability: The architecture allows for easy scalability by adding more servers or resources to each tier as needed.
3.	Separation of Concerns: Each tier has a specific responsibility, promoting a clear separation of concerns and making the system easier to understand and maintain.
4.	Reusability: Components within each tier can be reused in different parts of the system, enhancing efficiency and reducing redundancy.
5.	Flexibility: Changes to one tier do not necessarily affect the others, providing flexibility in development and updates.


Agile Software Development Life Cycle (SDLC) Phases:
1. Requirements Gathering and Analysis:
•	Agile Approach: Agile acknowledges that requirements are likely to change and evolve over the course of the project. Therefore, instead of attempting to gather all requirements upfront, Agile focuses on capturing the most critical and high-priority requirements initially.
2. Design:
•	Agile Approach: Agile promotes a collaborative and adaptive design process. Design decisions are made incrementally, and changes can be accommodated easily as the project progresses. Design considerations are revisited and adjusted as needed during each iteration.

3. Implementation (Coding):
•	Agile Approach: Agile encourages iterative development and continuous integration. Development is done in short cycles, known as iterations or sprints. Each iteration results in a potentially shippable product increment, allowing for frequent releases and customer feedback.
4. Testing:
•	Agile Approach: Testing is an integral part of each iteration. Automated testing is often emphasized to ensure rapid and reliable testing of new features. Continuous testing helps maintain the quality of the product throughout the development process.
5. Deployment:
•	Agile Approach: Incremental deployment is a key aspect of Agile. As features are completed and tested in each iteration, they can be deployed independently. This allows for early delivery of valuable functionality to end-users.
6. Feedback and Iteration:
•	Agile Approach: Agile emphasizes continuous feedback loops. Regular meetings, such as sprint reviews and retrospectives, provide opportunities for stakeholders to review progress, provide feedback, and make adjustments. Feedback is used to refine requirements and adapt the project plan.
7. Customer Collaboration:
•	Agile Approach: Customer collaboration is crucial in Agile. Customers are involved throughout the development process, providing feedback and clarifications. This ensures that the product aligns with customer expectations and requirements.
8. Adaptability:
•	Agile Approach: Agile embraces change and encourages teams to adapt to evolving requirements. The iterative nature of Agile allows for flexibility, enabling teams to respond quickly to changing priorities or customer needs.
Benefits of Agile SDLC for the Library Management System:
1.	Flexibility in Requirements: Agile accommodates changes in requirements, ensuring that the system can adapt to evolving needs.
2.	Frequent Deliveries: Incremental releases allow for the early delivery of working functionality, providing value to users sooner.
3.	Continuous Feedback: Regular feedback loops ensure that the project stays aligned with customer expectations, reducing the risk of misalignment.
4.	Collaboration: Agile promotes collaboration among team members, stakeholders, and customers, fostering a shared understanding of goals and priorities.
5.	Reduced Risks: The iterative and incremental nature of Agile helps identify and address issues early in the development process, reducing overall project risks.



CHAPTER 4
SYSTEM DESIGN
 3.1 	TABLE DESIGN 
VARIOUS TABELS TO MAINTAIN INFORMATION 
	Library Table from Database 
	 Admin Table  from Database
 
	Student Table  from Database

	Books Table from Database 
	 
 
	Table from Database


	pending books requests :

 




	3.2 	DATA FLOW DIAGRAMS 
 	  	 
 	 

After entering to the home page of the website , Admin can choose the  Admin Login option where they are asked to enter username & password  , and if he/she is a valid user then a teacher login page will be displayed.  
 
 


USE CAESE DIAGRAM FOR USER 
 
 

After entering to the home page of the website , student can choose the USER LOGIN option where they are asked to enter username & password , and if he/she is a valid user then a student login page will be displayed. 









 CHAPTER 5
SYSTEM IMPLEMENTATION
4.1 	Screenshot for homepage 
 
4.2 Screenshot of  login for admin 
 4.3 Screenshot of  login for admin

4.4 Screenshot of Operations from admin 

 
 
 
 4.5 Screenshot of View pending books request 
 
 
4.6 Screenshot of Return A Book




  

4.8 Student login:


4.9 Student Profile





4.10 pending books request form the Student:

4.11 Student Home pages and Request for books: 



4.12 Issue Books: 









 

CHAPTER 6
 SYSTEM TESTING

The aim of the system testing process was to determine all defects in our project .The program was subjected to a set of test inputs and various observations were made and based on these observations it will be decided whether the program behaves as expected or not. Our 
Project went through two levels of testing  
1.Unit testing 
2.integration testing 
3. backbox testing
 

5.1 UNIT TESTING
Unit testing is undertaken when a module has been created and succesfully reviewed .In order to test a single module we need to provide a complete environment ie besides the module we would require 
•	The procedures belonging to other modules that the module under test calls
•	Non local data structures that module accesses
•	A procedure to call the functions of the module under test with appropriate parameters
Unit testing was done on each and every module that is described under module description of chapter 

1. Test For the admin module 
	Testing admin login form-This form is used for log in of administrator of the system. In this we enter the username and password if both are correct administration page will open other wise if any of data is wrong it will get redirected back to the login page and again ask for username and password

	Student account addition- In this section the admin can verify student details from student academic info and then only add student details to main library database it contains add and delete buttons if user click add button data will be added to student database and if he clicks delete button the student data will be deleted

	Book Addition- Admin can enter details of book and can add the details to the main book table also he can view the books requests 
2.	Test for Student login module 
 
•	Test for Student login Form-This form is used for log in of Student .In this we enter theileriid, username and password if all these are correct student login page will open other wise if any of data is wrong it will get redirected back to the login page and again ask for library, username and password.

•	Test for account creation- This form is used for new account creation when student does not fill the form completely it asks again to fill the whole form when he fill the form fully it gets redirected to page which show waiting for conformation message as his data will be only added by administrator after verification.
3.	Test for teacher login module- 
 		Test for teacher login form- This form is used for logg in of teacher .In this we enter the username and password if all these are correct teacher login page will open other wise if any of  data is wrong it will get redirected back to the login page and again ask for username and password. 

5.2 INTEGRATION TESTING  
In this type of testing we test various integration of the project module by providing the input .The primary objective is to test the module interfaces in order to ensure that no errors are occurring when one module invokes the other module. 
1.	 Admin Module Integration:
•	Checked the integration of the admin module with the student and book modules.
•	Verified that admin actions, such as adding students and books, function correctly.
2.	Student Module Integration:
•	Tested the integration of the student module with the admin and book modules.
•	Verified that student login and account creation work seamlessly with the admin and book functionalities.
3.	Teacher Module Integration:
•	Ensured the integration of the teacher module with the admin module.
•	Verified that teacher login works cohesively with admin functionalities.
5.3 Black Box Testing:
Overview:
•	Definition: Black Box Testing is a testing technique where the internal workings of the system are not known to the tester. The focus is on the system's inputs and outputs, treating the system as a "black box."
•	Applicability: Suitable for functional and non-functional testing to validate that the system behaves as expected from the user's perspective.
Activities:
1.	Functional Testing:
•	Verified that functions like user authentication, book search, and user registration work as intended.
•	Checked if the system produces the expected output for various inputs.
2.	Boundary Value Analysis:
•	Tested the system with inputs at the boundaries of valid and invalid ranges to identify potential issues.
3.	Equivalence Partitioning:
•	Grouped inputs into equivalence classes and tested representative values from each class.
4.	Error Guessing:
•	Deliberately introduced erroneous inputs to identify how the system handles errors.
•	Assessed error recovery mechanisms.
5.	Usability Testing:
•	Evaluated the user interface for ease of use and user satisfaction without knowledge of the internal code.
•	Checked if the system is intuitive and user-friendly.
Conclusion:
•	Black Box Testing focused on validating the system's functionality from an external perspective, ensuring that it meets user requirements. It involved testing various scenarios, including boundary cases, error handling, and usability aspects.
CHAPTER 7 
CONCLUSION & FUTURE SCOPE

In conclusion, the Simple Online Library Management System presented in this project provides a comprehensive solution for efficiently managing library-related tasks. The system is designed to simplify the organization and administration of library operations, offering a user-friendly interface for both administrators and students.
The project aims to achieve specific objectives, including the implementation of a search feature for book availability, an admin login for book management, and a student login to view profiles, issued books, and pending book requests. The background of the project highlights the need for a computerized system to address issues such as file loss, damage, difficulty in searching records, space consumption, and cost.
The system analysis section delves into the software requirements, hardware specifications, and the existing system's drawbacks. The proposed system addresses these drawbacks by introducing an online library system that allows users to register, manage their accounts, and facilitates efficient book management by the administrator.
The software tools used in the project include HTML, CSS, JavaScript, and PHP for the front end, while MySQL is employed as the backend database. The functional and non-functional requirements are thoroughly discussed, emphasizing efficiency, reliability, usability, and organizational implementation.
The proposed system aims to improve control and performance, save costs and time, provide an online notice board, and facilitate the uploading of lecture notes. The project specifies both non-functional and functional requirements, ensuring the system's efficiency, reliability, and usability.
In terms of software and hardware requirements, the project utilizes Windows 11, MySQL, and a combination of HTML, PHP, CSS, and JavaScript. The existing system's limitations, such as manual record-keeping and complexity in maintenance, are addressed through the proposed system's features, offering a more efficient and user-friendly library management solution.
In summary, the project concludes by highlighting the shift from manual library management to a computerized system, emphasizing the benefits of efficiency, accuracy, and improved user experience in managing library-related tasks. The proposed system addresses the challenges of the existing system and provides a robust solution for modern library management needs. 
 


CHAPTER 8
REFERENCES

 
•	 phpMyAdmin Documentation: https://docs.phpmyadmin.net/
•	MySQL Documentation: https://dev.mysql.com/doc/
•	PHP Documentation: https://www.php.net/manual/en/index.php
	http://www.w3schools.com/html/html_intro.asp
	http://www.Udemy.com/css/css_background.asp
	http://www.w3schools.com/js/js_datatypes.asp 


