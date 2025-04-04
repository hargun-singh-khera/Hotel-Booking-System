# Hotel Booking System

## Overview
The **Hotel Booking System** is a web-based application designed to streamline the process of hotel reservations and room management. It provides an intuitive interface for customers to browse available rooms, make reservations, and view booking details. Additionally, it empowers hotel administrators to manage room availability and pricing effectively, ensuring seamless operations and efficient data handling.

## Features
### For Customers:
- Browse available rooms with detailed descriptions and pricing.
- Make online reservations with real-time room availability.
- View booking details and receive confirmation.
- User-friendly interface for easy navigation.

### For Hotel Administrators:
- Manage room availability and pricing.
- View and manage customer reservations.
- Update room details, images, and other relevant information.
- Secure authentication system for admin access.

## Technologies Used
- **Frontend:** HTML, CSS, JavaScript, Bootstrap
- **Backend:** PHP
- **Database:** MySQL
- **Server:** Apache (XAMPP or any compatible server environment)
- **Version Control:** Git & GitHub

## Installation Guide
1. **Clone the repository:**
   ```sh
   git clone https://github.com/your-username/hotel-booking-system.git
   cd hotel-booking-system
   ```
2. **Set up the database:**
   - Import the provided `hotel_booking.sql` file into MySQL.
   - Update database credentials in `config/dbconnect.php`.
3. **Start the server:**
   - Use XAMPP or any local Apache server.
   - Place the project in the `htdocs` directory (if using XAMPP).
   - Start Apache and MySQL services.
4. **Run the application:**
   - Open a web browser and navigate to:
     ```
     http://localhost/hotel-booking-system/index.php
     ```

## Usage
### Customer Flow:
1. Register/Login to access booking features.
2. Browse available rooms.
3. Select a room and proceed with the reservation.
4. Receive booking confirmation.

### Admin Flow:
1. Log in to the admin panel.
2. Manage room details (availability, pricing, images).
3. View and update customer reservations.
4. Monitor booking statistics.

## Folder Structure
```
hotel-booking-system/
│-- config/
│   ├── dbconnect.php      # Database connection file
│-- includes/
│   ├── header.php        # Header file
│   ├── footer.php        # Footer file
│-- pages/
│   ├── home.php          # Home page
│   ├── rooms.php         # Rooms listing
│   ├── booking.php       # Booking system
│   ├── admin.php         # Admin panel
│-- assets/
│   ├── css/              # Stylesheets
│   ├── js/               # JavaScript files
│   ├── images/           # Images used in the project
│-- index.php             # Main entry point
│-- login.php             # User authentication
│-- signup.php            # User registration
│-- README.md             # Documentation
```

## Future Enhancements
- Implement online payment integration.
- Add a customer review and rating system.
- Develop a mobile-responsive version.
- Implement an advanced search and filtering system for room selection.

## Live Demo
[Click here to view the live project](http://heritagehotel.iceiy.com/) 

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contributing
Contributions are welcome! If you'd like to improve this project, feel free to fork the repository and submit a pull request.

## Contact
For any inquiries or suggestions, reach out to hargunsinghkhera@gmail.com](mailto:hargunsinghkhera@gmail.com).



