# CourtSync IIUM - One-Stop Sports Booking Center

## 1. Project Overview
**CourtSync IIUM** is a web-based sports facility booking system developed to simplify and modernize the reservation process within the International Islamic University Malaysia (IIUM). Built using the Laravel MVC framework, the application allows students to view available facilities, make bookings, and manage reservations efficiently through a centralized platform.

---

## 2. Group Information
**Group Name**: [Insert Group Name]  
**Section**: 2  
**Course**: BIIT 2305 Web Application Development  

**Group Members**:
1. **Wan Muhammad Danish Bin Abdullah** - 2417883
2. **Abdul Rahim Bin Kasim** - 2410071
3. **Muhammad Yusuf Bin Mohd Noor** - 2412207
4. **Aziz Tubagus Fauzan Abdul** - 2324623
5. **Izzul Nuqman Bin Nor Aizam** - 2416325

---

## 3. Features and Functionalities

### **Student Features**
*   **User Registration & Login:** Secure account creation using Laravel Jetstream.
*   **Interactive Dashboard:** Real-time summary of personal booking statistics (Total, Upcoming, Completed).
*   **Facility Directory:** Browse available sports venues (Stadium, Futsal, Badminton) with clean UI cards.
*   **Venue Details & Timetable:** View detailed descriptions and a live timetable of occupied slots to avoid double booking.
*   **Booking Management (CRUD):** 
    *   **Create:** Book a specific court for a chosen date and time slot.
    *   **Read:** View history in a dedicated "My Bookings" list.
    *   **Delete:** Cancel reservations with instant database updates.

### **Admin Features**
*   **Role-Based Access:** Protected Admin panel using Laravel Gates.
*   **Facility Management (CRUD):** Admin can add new sports facilities or delete old ones via a professional management table.

---

## 4. Technical Implementation

### **Technology Stack**
*   **Backend Framework:** Laravel 12.x (PHP)
*   **Frontend:** Blade Templates with **Mazer UI Template** (Bootstrap 5)
*   **Database:** MySQL (via XAMPP)
*   **Authentication:** Laravel Jetstream & Livewire

### **Database Design (ERD)**
*   **users:** id, name, email, role, password.
*   **facilities:** id, name, location, category, status.
*   **bookings:** id, user_id (FK), facility_id (FK), booking_date, start_time, end_time.

---

## 5. User Authentication System
*   **Features:** Secure login, registration, and role-based redirection.
*   **Security:** Uses CSRF tokens, password hashing (Bcrypt), and Route Middleware to prevent unauthorized access to the Admin panel.

---

## 6. Installation and Setup Instructions

### **Prerequisites**
*   XAMPP (PHP 8.2+)
*   Composer
*   Git

### **Step-by-Step Installation**
1.  **Clone/Extract the project** into `C:\xampp\htdocs\courtsync`.
2.  **Install Dependencies:**
    ```bash
    composer install
    ```
3.  **Environment Setup:**
    *   Rename `.env.example` to `.env`.
    *   Generate key: `php artisan key:generate`.
4.  **Database Configuration:**
    *   Create a database named `courtsync_db` in phpMyAdmin.
    *   Update `.env` file: `DB_DATABASE=courtsync_db`.
5.  **Migrations & Seeding:**
    ```bash
    php artisan migrate:fresh --seed
    ```
6.  **Run the application:**
    ```bash
    php artisan serve
    ```

---

## 7. Conclusion and Learning Outcomes
*   **Technical Skills:** Mastered Laravel MVC architecture, Eloquent relationships, and UI integration with external templates.
*   **Key Achievement:** Successfully implemented a role-based access system with a live timetable for sports facility management.
*   **Impact:** CourtSync IIUM demonstrates how digital solutions can improve university resource efficiency.

---

## 8. References
1.  Laravel Documentation: [laravel.com/docs](https://laravel.com/docs)
2.  Mazer UI Template: [github.com/zuramai/mazer](https://github.com/zuramai/mazer)
3.  Bootstrap 5 Documentation: [getbootstrap.com](https://getbootstrap.com)