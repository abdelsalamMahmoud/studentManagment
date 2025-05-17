# 🎓 Basic Student Management System (PHP Native)

This is a simple **Student Management System** built using **native PHP and MySQL**. It allows an admin to manage student records and their grades through a clean dashboard interface. Students can also log in and view their personal dashboard.

---

## ✨ Features

- ✅ User Authentication (Admin & Student)
- 📋 CRUD for Student Records
- 📊 CRUD for Student Grades
- 🔍 Search Students by Name or ID
- 💻 Admin Dashboard
- 👤 Student Dashboard
- 🎨 Responsive Login UI

---

## 📷 Wireframe Preview

![Wireframe Preview](designs/student%20managment.jpg)

---

## 🛢️ Database Schema

![Database Schema](designs/DB%20tables.jpg)


---

## 🧱 SQL to Create Tables

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('student', 'admin') NOT NULL
);

CREATE TABLE grades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    subject_name VARCHAR(100) NOT NULL,
    grade DECIMAL(5,2) NOT NULL,
    student_id INT NOT NULL,
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE
);
