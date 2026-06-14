# CourtSync IIUM

# CourtSync IIUM - One-Stop Sports Booking Center

## 1. Project Title and Description

**CourtSync IIUM** is a web-based sports facility booking system designed to modernize and automate the reservation process within the International Islamic University Malaysia (IIUM). Built using the Laravel MVC framework, the application allows students to browse facilities, make bookings, and manage reservations efficiently through a centralized, Shariah-compliant platform.

---

## 2. Group Information
**Group Name**: Uhuy  
**Section**: 2  
**Course**: BIIT 2305 Web Application Development  

**Contributors/Team Members**:
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

### **How the System Works**
The system follows the Model-View-Controller (MVC) architectural pattern. The process begins when a student selects a facility and time slot through the Blade Template View, which triggers a request to the Laravel Route. The request is then handled by the BookingController and processed by the Eloquent Booking Model to execute operations in the MySQL database.

### **Technology Stack**
*   **Backend Framework:** Laravel 12.x (PHP)
*   **Frontend:** Blade Templates with **Mazer UI Template** (Bootstrap 5)
*   **Database:** MySQL (via XAMPP)
*   **Authentication:** Laravel Jetstream & Livewire

### **Database Design & (ERD)**
*   **users:** id, name, email, role, password.
*   **facilities:** id, name, location, category, status.
*   **bookings:** id, user_id (FK), facility_id (FK), booking_date, start_time, end_time.

The database is designed with a relational structure to ensure data integrity.

* **Core Tables:** users, facilities, and bookings.  
* **Entity Relationship Diagram (ERD):** [View ERD Diagram] 
(https://drive.google.com/file/d/1VARnrFGkUexfAD2HEXt3d1avvd815_0a/view?usp=sharing)

* **Key Relationships**

 * **One-to-Many (1: M) between Users and Bookings:** 
 One user can register and create multiple bookings over time, but each specific booking record belongs to only one user.  

 * **One-to-Many (1: N) between Facilities and Bookings:** 
 One facility (Sayyidina Hamzah Stadium) can be associated with many different booking records across different time slots.  

---

## 5. User Authentication System
*   **Features:** Secure login, registration, and role-based redirection.
*   **Security Measure:** Uses CSRF tokens, password hashing (Bcrypt), and Route Middleware to prevent unauthorized access to the Admin panel.

---

## 6. Laravel Component Implementation

* **Routes:** Defined in routes/web.php to handle requests.  
* **Controllers:** BookingController manages the validation and processing of reservation requests.  
* **Models & Relationships:** Eloquent models are used for User, Facility, and Booking to manage One-to-Many relationships.  
* **Views:** Blade templates provide the responsive UI for the dashboard and booking forms

---

## 7. Installation and Setup Instructions

### **Prerequisites**
*   XAMPP (PHP 8.2+)
*   Composer
*   Git
*   MySQL
*   PHP

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

## 8. Testing and Quality Assurance

* **Functionality Testing:** Verified CRUD operations for bookings and facility management.
* **Compatibility:** Verified CRUD operations for bookings and facility management.

---

## 9. Challenges Faced and Solutions

* **Challenge:** Managing complex booking relationships.

* **Solution:**  Implemented Eloquent ORM relationships to ensure data integrity between users, facilities, and booking records.

---

## 10. Future Improvements

Integration of real-time administrative notifications for booking updates.
Advanced reporting modules for facility usage statistics.

---

## 11. Conclusion and Learning Outcomes

CourtSync IIUM has bridged the gap between manual management of sports facilities and modern digital convenience. Our team has successfully created a platform that meets the technical requirements of BIIT 2305 and provides real value to the IIUM community by combining the Laravel MVC framework with a responsive UI. This project is a full display of our capability in building secure, scalable, user-oriented web applications, while strictly abiding by Shariah-compliant principles.

*   **Technical Skills Gained** 

* **Laravel Framework:** 
Deepened understanding of the MVC (Model-View-Controller) architecture, request handling, and routing.  

* **Database Design:** 
Developed proficiency in designing efficient relational database schemas and managing complex data relationships using Eloquent ORM.

* **Full-Stack Development:** 
Gained practical experience integrating dynamic Blade templates with responsive UI frameworks like Mazer (Bootstrap 5).

* **Version Control:** 
Enhanced skills in collaborative coding and managing project versions using Git and GitHub. 

*   **Soft Skills Developed** 

* **Team Collaboration:** 
Successfully coordinated tasks and integrated individual modules within a group environment.

* **Project Management:** 
Learned to plan, track, and execute a complex software development lifecycle (SDLC) under strict deadlines.

* **Problem Solving:**
Developed critical debugging skills by identifying and resolving technical challenges, such as preventing double-booking conflicts.

* **Documentation:** 
Gained professional experience in creating comprehensive, readable project documentation

*   **Key Achievements**

Successfully implemented all core Laravel components (Routes, Controllers, Models, Views) as required for the BIIT 2305 project.

Developed a fully functional CRUD system that handles real-time booking, user management, and facility maintenance. 

Applied industry-standard security practices, including CSRF protection and role-based middleware access control. 

*   **Project Impact**

This project transforms the manual booking process at IIUM into a seamless, digital experience. By automating reservation management, CourtSync IIUM eliminates the need for physical paperwork and provides the university community with a transparent, efficient, and Shariah-compliant tool for accessing campus resources

---

## 12. References

1. Laravel Framework Documentation. (2026). Laravel Official Documentation. 
Retrieved from https://laravel.com/docs

2. Kulliyyah of Information and Communication Technology (KICT). (2026). BIIT 2305: Web Application Development Class Handouts and Lab Modules. International Islamic University Malaysia.
Retrieved from https://italeemc.iium.edu.my/my/

3. Zuramai. (2026). Mazer: Bootstrap 5 Admin Dashboard Template. 
Retrieved from https://github.com/zuramai/mazer

4. MySQL Documentation. (2026). MySQL 8.0 Reference Manual. 
Retrieved from https://dev.mysql.com/doc/refman/8.0/en/

5. Figma. (2026). Figma: The Collaborative Interface Design Tool. 
Retrieved from https://www.figma.com

6. MDN Web Docs. (2026). Web Development Resources. 
Retrieved from https://developer.mozilla.org/
 
---
- Project Completion Date: 13/6/2026
- Course: BIIT 2305 Web Application Development