# Cascade - Contactless Cafeteria Ordering System

A full-stack cafeteria management platform with contactless ordering, AI-powered face recognition attendance, food consumption analytics, and a dual-panel interface for customers and admins.

![Cascade](https://user-images.githubusercontent.com/72935128/140618746-24722917-5800-4a1a-bbf8-d870a7641df6.png)

---

## The Problem

Manual cafeteria management is slow, error-prone, and resource-intensive. Paper-based ordering and attendance tracking leads to billing errors, food waste, and inability to make data-driven decisions. Post-COVID, contactless interaction became not just a convenience but a necessity.

**Cascade** automates the entire cafeteria lifecycle - from contactless ordering to AI-based attendance - giving managers real-time visibility into consumption, revenue, and operations.

---

## Features

**Customer Portal**
- Browse food menu by category with images and prices
- Search for specific food items
- Place orders with quantity selection - no physical contact required
- Receive auto-generated invoices on order confirmation
- Submit feedback on food and service

**Admin Dashboard**
- Real-time stats - total categories, food items, orders, and revenue generated
- Full CRUD operations for food items, categories, and admin accounts
- Order management with status tracking: `Ordered` → `In Kitchen` → `Pickup Ready` → `Delivered` / `Order Collected` / `Cancelled`
- Food collection delay monitoring
- Feedback management and analysis
- Meal planning across breakfast, lunch, and dinner including special events

**AI-Based Face Recognition Attendance**
- OpenCV Haar Cascade classifier for real-time face detection from webcam
- LBPH (Local Binary Pattern Histogram) face recognizer for student identification
- Trained on labeled face image datasets per student ID
- Attendance and food collection tracking logged directly to MySQL
- Supports penalty and refund decisions based on collection records

---

## System Architecture

```
Customer Browser
      |
   PHP Pages (index, foods, categories, order, invoice, contact)
      |
   MySQL Database (tbl_food, tbl_category, tbl_order)
      |
   Admin Panel (manage orders, food, categories, delays, feedback)

Attendance Module (separate)
      |
   OpenCV Webcam Feed
      |
   Haar Cascade Face Detection
      |
   LBPH Face Recognizer (trainingdata.yml)
      |
   MySQL (attendance + food collection records)
```

---

## Tech Stack

| Layer | Technology |
|---|---|
| Frontend | HTML5, CSS3 |
| Backend | PHP (Procedural) |
| Database | MySQL (via mysqli) |
| Face Detection | OpenCV, Haar Cascade XML |
| Face Recognition | LBPH Face Recognizer (OpenCV) |
| CV Pipeline | Python, NumPy |
| Local Server | XAMPP (Apache + MySQL) |

---

## Project Structure

```
Cascade/
|
├── index.php                     # Customer homepage
├── foods.php                     # Full food menu
├── categories.php                # Browse by category
├── category-foods.php            # Foods within a category
├── food-search.php               # Search food items
├── order.php                     # Order form + DB insert
├── invoice.php                   # Order confirmation invoice
├── contact.php                   # Customer feedback form
|
├── admin/
|   ├── index.php                 # Dashboard - counts + revenue
|   ├── manage-food.php           # View all food items
|   ├── add-food.php              # Add new food item
|   ├── update-food.php           # Edit food item
|   ├── delete-food.php           # Delete food item
|   ├── manage-category.php       # Category management
|   ├── manage-order.php          # Order status management
|   ├── manage-delay.php          # Food collection delay tracking
|   ├── manage-feedback.php       # Customer feedback review
|   ├── manage-admin.php          # Admin account management
|   └── login.php / logout.php    # Admin auth
|
├── attendance/
|   ├── FaceRecognitionDatabase.ipynb   # Face detection + LBPH training
|   └── haarcascade_frontalface_default.xml
|
├── config/
|   └── constants.php             # DB connection + site URL constants
|
├── css/
|   ├── style.css                 # Customer portal styles
|   └── admin.css                 # Admin panel styles
|
├── partials-front/               # Customer header + footer
├── Documents/                    # SRS, SDD, Project Pitch
└── LICENSE
```

---

## Getting Started

### Prerequisites

- [XAMPP](https://www.apachefriends.org/) (Apache + MySQL)
- PHP 7+
- Python 3 + OpenCV (for attendance module only)
- A text editor (VS Code, Sublime Text, etc.)

### Setup

**1. Clone the repository**

```bash
git clone https://github.com/deepti-96/Cascade-Contactless-Cafetaria-Ordering-System.git
```

**2. Move to XAMPP web root**

```bash
mv Cascade-Contactless-Cafetaria-Ordering-System /path/to/xampp/htdocs/Cascade
```

**3. Import the database**

- Open [phpMyAdmin](http://localhost/phpmyadmin)
- Create a new database named `Cascade`
- Import the SQL schema from `Documents/`

**4. Configure the connection**

Update `config/constants.php` if needed:

```php
define('SITEURL', 'http://localhost/Cascade/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'Cascade');
```

**5. Start XAMPP and visit**

```
http://localhost/Cascade/
```

Admin panel:

```
http://localhost/Cascade/admin/
```

### Attendance Module Setup

```bash
pip install opencv-python numpy mysql-connector-python
```

Add student face images to `attendance/users/<student_id>/` and run the notebook to train the LBPH model:

```bash
jupyter notebook attendance/FaceRecognitionDatabase.ipynb
```

The trained model is saved as `trainingdata.yml` and used for real-time recognition.

---

## Order Status Flow

```
Ordered → In Kitchen → Pickup Ready → Delivered / Order Collected
                                    → Cancelled
```

---

## Future Improvements

- Integration with college online portal and student ID system
- Credit/debit card payment gateway
- Mobile app for order tracking
- Predictive food demand forecasting using historical order data
- Push notifications for order status updates

---

## Documents

- `Documents/SRS.pdf` - Software Requirements Specification
- `Documents/SDD.pdf` - Software Design Document
- `Documents/Project Pitch.pptx` - Project presentation
