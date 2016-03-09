# Forum-MVC-PHP-MySQL-Bootstrap-v3.3.1-jQuery-1.11.1
* Forum written in PHP, following MVC pattern. MySQL database, Models/Database.php.
* follows Singleton pattern for one instance only.
* Server-side full validation and data integrity, including authorization and authentication.
* Bootstrap CS and jQuery for Client-side validation.

<br /> 
##The objective of this project was to showcase the Model View Controller design pattern, as well as displaying how a full scalable and easy to maintain web app can be built without using a framework.
<br />
<br /> Models folder contains all the application's data objects and entities that are embodied in the data base.
<br /> The model Database implements the Singleton pattern to avoid multiple sessions, and provides methods to produce CRUDs.
<br /> Controller folder contains application's logic. Manipulating Models, Views and grabbing GET, POST requests.
<br /> Views folder contains .php files than render the corresponding HTML.o
<br /> Html folder contains all the generated results in .php files to add dynamic content.
<br />
<br /> Manually set up the database running the query /Install Database first/database.sql
