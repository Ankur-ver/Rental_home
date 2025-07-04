# 🏠 Rental House Management System

A full-featured Rental House Management System built with **PHP**, **MySQL**, and **Bootstrap**, designed to streamline tenant, room, and staff management in rental properties. This system includes admin and staff roles, dynamic dashboards, and secure authentication.

---

## 🔧 Features

- 🔐 **Authentication**
  - Secure Admin and Staff login
  - Session-based access control

- 🧑‍💼 **User Roles**
  - Admin: Full control over all resources
  - Staff: Restricted access for regular operations

- 🏘️ **Rental Management**
  - Add, edit, delete rooms
  - Assign tenants to rooms
  - Monitor occupancy status

- 👥 **Tenant Management**
  - Add new tenants
  - View and update tenant details
  - Handle House assignments

- 🧑‍💻 **Staff Management**
  - Create and manage staff users
  - Assign roles dynamically

- 📊 **Dashboard**
  - Overview of total house, tenants, available units, category
  - Clean and responsive interface

- 📅 **Booking/Occupancy Tracking**
  - Track which house are occupied/vacant
  - Easy visual representation

---

## 💻 Technologies Used

- **Frontend**: HTML5, CSS3, Bootstrap 4
- **Backend**: PHP 7+
- **Database**: MySQL
- **Tools**: XAMPP, VS Code

---

## 🚀 How to Run Locally

1. **Install XAMPP** (https://www.apachefriends.org/)
2. Place project folder inside `htdocs`:


3. **Start Apache and MySQL** from XAMPP Control Panel

4. **Import the database**:
- Open `phpMyAdmin`
- Create a database (e.g., `rental_house`)
- Import the provided `.sql` file from the `database/` folder

5. **Configure the database connection**:
- Open `db_connect.php`
- Set your credentials:
  ```php
  $conn = new mysqli("localhost", "root", "", "rental_db");
  ```

6. **Run the project** in your browser:

**Login Credentials**:
Username: ankurverma7707@gmail.com
Password: rootadmin
https://drive.google.com/drive/folders/1yivLdQhp-nH15_pagCqTcS_KD0ndi42c?usp=sharing
**Login Credentials**:
![Demo Images](https://drive.google.com/drive/folders/1yivLdQhp-nH15_pagCqTcS_KD0ndi42c?usp=sharing)
## 📜 License

This project is licensed under the [MIT License](LICENSE).
