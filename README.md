# The_Fullness_Shelf 
Welcome to Fullness Shelf! This is a web-based application designed to provide an online platform for buying books. The application allows users to browse, search, and purchase books online. It also includes an admin interface for managing books, orders, and user accounts.

## Table of Contents
-- [Introduction]
-- [Features]
-- [Technologies Used]
-- [Getting Started]
-- [Installation]
-- [Usage]
-- [Admin Interface]
--[Contributing]


## Introduction
The Fullness Shelf project aims to create an intuitive and user-friendly online bookstore where customers can find a wide variety of books and make secure purchases. The project is designed to cater to both customers and administrators.

## Features
1. User Registration and Login: Customers can create an account and log in to access their profiles and order history.
2. Book Listing: The platform displays a list of available books, with details such as title, author, price, and discount.
3. Book Details: Users can view more information about a specific book, including a brief description and its cover image.
4. Shopping Cart: Customers can add books to their shopping cart and proceed to checkout to complete the purchase.
4. Order Management: Admins can manage and update the status of orders placed by customers.
5. Admin Dashboard: The admin interface allows administrators to add new books to the store, edit book details, and manage user accounts.

Technologies Used
1. HTML, CSS, JavaScript: For building the frontend user interface.
2 PHP: For server-side scripting and database interactions.
3. MySQL: As the database management system to store book details, user information, and orders.
4. Bootstrap: For responsive and mobile-friendly design.
5. Apache (or Nginx): As the web server to host the application.

## Getting Started
To run the Fullness Shelf project on your local machine, follow the installation steps provided below.

## Installation
1. Clone the repository to your local machine using Git: (git clone https://github.com/louisafful1/The_Fullness_Shelf.git)
2. Configure your web server (Apache or Nginx) to serve the project files from the cloned directory.
3. Import the database schema by running the SQL script database.sql in your MySQL database.
4. Update the database connection details in the include/database.php file to match your MySQL database credentials.

## Usage
1. Open your web browser and navigate to the project URL hosted on your local server.
2. Register as a new user or log in using an existing account.
3. Browse the book catalog, view book details, and add books to the cart.
4. Proceed to checkout and complete the order.
5. Administrators can access the admin interface by navigating to /admin and logging in using admin credentials.

## Admin Interface
The admin interface provides additional functionality for administrators:

1. Add new books to the store.
2. Edit book details and manage stock.
3. View and process customer orders.
4. Manage user accounts and permissions.
5. To access the admin interface, go to /admin and log in using admin credentials.

## Contributing
I welcome contributions from the community to enhance the Fullness Shelf project. If you find any issues or have ideas for improvement, please feel free to open an issue or submit a pull request.
