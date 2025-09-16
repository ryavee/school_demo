# School Demo Project

This project is a simple PHP application to manage students and classes in a school. It allows users to add, view, edit, and delete students and classes. The project uses MySQL for the database and Bootstrap for styling.

## Features

- Add, view, edit, and delete students.
- Add, view, edit, and delete classes.
- Navigation bar for easy access to different pages.
- Modal for editing classes.

## Prerequisites

- PHP >= 7.3
- MySQL
- XAMPP (or any other local server with PHP and MySQL)
- Git

## Installation

1. **Clone the repository**

   ```bash
   git clone https://github.com/yourusername/school_demo.git
   cd school_demo

2. **Set up the database**

 - Open phpMyAdmin and create a database named school_db.
 - Import the provided SQL file (`school_db.sql`) to create the necessary tables.

3. **Configure the project**

- Ensure XAMPP (or your local server) is running.
- Place the project folder (`school_demo`) inside the `htdocs` directory of XAMPP.
- Edit the `db.php` file and update the database credentials if necessary. 

4. **Run the project**
- Open a web browser and navigate to [http://localhost/school_demo](http://localhost/school_demo).

## Project Structure

- `index.php`: Main page displaying the list of students.
- `classes.php`: Page for managing classes.
- `create.php`: Page for adding new students.
- `edit.php`: Page for editing student details.
- `view.php`: Page for viewing student details.
- `db.php`: Database connection file.
- `delete.php`: Script for deleting students.
- `delete_class.php`: Script for deleting classes.
- `edit_class.php`: Script for editing classes.
- `uploads/`: Directory to store uploaded images.
- `school_db.sql`: SQL file to set up the database.

## Screenshots
1. **Student Lists**
   ![demo-1](https://github.com/ryavee/school_demo/assets/46756880/5bc6902f-3005-4d3e-8e09-b49ab5cb0ab1)
   
2. **Manage Classes**
   ![Demo-2](https://github.com/ryavee/school_demo/assets/46756880/05dc022b-715d-40e7-b175-461f6e164413)

3. **Add Student**
   ![Demo-3](https://github.com/ryavee/school_demo/assets/46756880/d9b93a5f-36c8-4aab-b060-0fae2bbaa43f)

4. **Edit Class**
   ![Demo-4](https://github.com/ryavee/school_demo/assets/46756880/bffcb4f9-8b1b-459a-bd79-aa44525288ae)

## Live Demo

You can see a live demo of the project [here](http://school-demo.rf.gd/).

## Author

- Ravi Raj
- [Email](mailto:raj.iamravi@gmail.com)



