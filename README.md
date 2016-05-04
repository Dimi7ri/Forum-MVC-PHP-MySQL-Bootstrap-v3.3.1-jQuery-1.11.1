# Forum-MVC-PHP-MySQL-Bootstrap-v3.3.1-jQuery-1.11.1
* Forum written in PHP, MVC pattern. MySQL database using Models/Database.php for CRUD operations.
* Singleton pattern for only one database instance.
* Server-side full validation and data integrity in models.
* Authorization and Authentication using cookies in controllers.
* Bootstrap CS and jQuery for Client-side validation.

##The objective of this project is to showcase pure Model View Controller design pattern, as well as displaying how a full scalable and easy to maintain web app can be built without using any framework.
##<br />Components and breif explanation.
* The model Database implements the Singleton pattern to avoid multiple sessions, and provides methods to produce CRUDs
* Models folder contains all the application's data objects and entities that are embodied in the data base.
* Controller folder contains application's logic. Manipulating Models, Views and grabbing GET, POST HTTP requests.
* Views folder contains .php files than render the corresponding HTML.
* Html folder contains all the generated results in .php files to add dynamic content.
<br />
<br /> Manually set up the database running the query /Install Database first/database.sql
