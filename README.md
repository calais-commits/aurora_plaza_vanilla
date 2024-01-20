# Aurora Plaza

## About

This project is a website of a fictitious shopping mall, where the stores that are for sale are published from the admin page, for the visualization of these as products on the client page.

## Built with

- HTML
- CSS
- PHP
- MYSQL
- JS

## Prerequisites

You must have a local server, for example, XAMPP for Windows, or other alternatives that allow you to run Apache2 MySQL, as well as a browser and internet connection.

## How to use it

To make this page work on your local server, you must execute the SQL queries that are in database/query.sql in PHPMyAdmin. In this way, you will create the database needed for this project.
Modify the /database/dbconn.php file with the data needed to log into your local server by modifying the variables below the "DB DATA" comment. By default these come with the values needed to connect to the live server.
Then, enter to the path where the project is saved from the browser and you will be in the Login page.
To have a user of type ADMIN and to have access to the display of the administrator page, you must create a user in the register.php page, then in the database, assign the value "1" to the "admin" field. This way, with that user you will be able to enter your data in the login page and access the administrator view.
Once you enter the administrator page, you will see an "Add" button, this will take you to the page to create a new product. In the following image I show the correct format to insert a product. 

![How to insert a product](/important/guide1.png)

To add more products to the carousel, it would be the same method and format.

## Example product

A sample product is inserted manually in the project files, I recommend that this is inserted manually directly from the database, the query is in the query.sql file and will work correctly as long as this is the first product inserted with ID 1. If you do not want to do this, no sample product will be shown in the carousel, they can still be inserted from the admin page as indicated.

## Important

The page needs some sample products to display a carousel of them. Here I will provide some sample links to upload images to the database when creating the product. These images are stored in an imgbb.com account, but you can provide any link to an image, as long as this link ends with the file type of the image, for example ".jpg". It is important that each product is created directly from the administrator section of the page, so that a page is dynamically created for the inserted product, if the insertion of a product is done directly from the database, this page will not be created. 

## Images links

The 'important' folder has a file with 9 example links to upload images when creating a product in the form. 

## Live demo

[Live Demo Link][(https://auroraplazavanilla.000webhostapp.com](https://auroraplazavanilla.000webhostapp.com/login/register.php))

## Author

👤 **Jesús Meléndez**

- Github: [@calais-commits](https://github.com/calais-commits)
- Gmail: [Jesús Meléndez](jesus.gabriel.mn.99@gmail.com)

## Show your support

Give a ⭐️ if you like this project!

## 📝 License

This project is [CC0-1.0](LICENSE) licensed. 
