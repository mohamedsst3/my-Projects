This is a simple E-commerce website built using PHP, MySQL, and Object-Oriented Programming (OOP) following the MVC (Model-View-Controller) architecture.
The project demonstrates:
User registration and login
Product listing
Shopping cart functionality
Basic admin panel to manage products
Database-driven dynamic content
This project was developed as a learning exercise to understand backend development, OOP, and MVC structure in PHP.
Features
User Features
User registration and login
Browse and search products
Add products to cart
View cart and manage items (add/remove/update quantity)
Checkout functionality (simulation)
Admin Features
Add, edit, and delete products
Manage product categories
View all orders (if implemented)
Technical Features
PHP Object-Oriented Programming (OOP)
MVC architecture (Model-View-Controller)
MySQL database for storing products, users, and orders
Basic HTML/CSS frontend
Modular, reusable code structure
Installation & Setup
Clone the repository
git clone https://github.com/mohamedsst3/my-Projects.git
Set up a local server
Use XAMPP, WAMP, or any PHP/MySQL server
Place project in the htdocs folder (or equivalent)
Create the database
Open phpMyAdmin and create a database, e.g., ecommerce_db
Import the provided database.sql file (if included)
(or manually create tables based on the models)
Configure database connection
Open config/Database.php or equivalent file
Update with your local database credentials:
host: localhost
user: root
password: 
database: ecommerce_db
Run the project
Open your browser and go to:
http://localhost/my-Projects/
Project Structure
/my-Projects
├── config/         # Database configuration
├── controllers/    # Controllers handling logic
├── models/         # Database models
├── views/          # Frontend templates
├── public/         # Public assets (CSS, JS, images)
├── index.php       # Entry point
└── README.md
Technologies Used
PHP (OOP)
MySQL
HTML5 / CSS3
JavaScript (basic)
MVC Architecture
Future Improvements
Add Laravel version to showcase framework skills
Improve UI with Bootstrap or Tailwind
Add payment integration
Implement order management for admin panel
Add REST API for products
License
This project is for learning and educational purposes. Feel free to use or modify it.
Contact
Developed by Mohammed S.
GitHub: https://github.com/mohamedsst3
