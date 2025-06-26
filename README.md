# **StreamSmart Subscription Management Platform**

Welcome to **StreamSmart**, your go-to platform for purchasing and managing OTT (Over-The-Top) subscriptions at better prices! This project offers a smart solution for users to enjoy premium streaming services at reduced costs, while administrators efficiently manage and issue team-based subscriptions.

---

## **Table of Contents**

1. [Project Overview](#project-overview)
2. [Features](#features)
3. [Technologies Used](#technologies-used)
4. [Setup and Installation](#setup-and-installation)
5. [Functionality](#functionality)
6. [Usage](#usage)
7. [Future Enhancements](#future-enhancements)
8. [Contributions](#contributions)
9. [License](#license)

---

## **Project Overview**

**StreamSmart** is a platform designed to allow users to purchase OTT subscriptions for popular platforms like YouTube and Spotify at better, more efficient prices. By leveraging multi-device subscription plans, the cost is shared among a team of users, making premium subscriptions affordable for everyone.

The platform also empowers administrators to issue and manage subscriptions, organize users into teams, and keep track of expiring subscriptions to ensure seamless service.

---

## **Features**

### For Users:
- **Affordable Subscriptions**: Purchase OTT subscriptions at reduced prices by sharing multi-device plans with other users.
- **Personalized Profile**: View personal details, including the total number of subscriptions purchased.
- **Team-Based Plans**: Join teams to share subscriptions and enjoy premium content.
- **Logout**: Log out securely from the platform.

### For Administrators:
- **Team Management**: Issue and assign subscriptions to users as part of a team.
- **Subscription Tracking**: View and manage expiring subscriptions to ensure uninterrupted service.
- **Platform Theming**: Handle subscriptions for YouTube, Spotify, and other OTT platforms with customized themes.

### Additional Features:
- **Expiring Subscriptions**: Identify subscriptions that are about to expire (within 2 days).
- **Team View**: Administrators can view all users in a team, including their details and subscription status.

---

## **Technologies Used**

- **Frontend**: HTML, CSS with platform-inspired themes.
- **Backend**: PHP
- **Database**: MySQL
- **Version Control**: Git and GitHub

---

## **Setup and Installation**

### Prerequisites:
1. PHP installed on your local machine.
2. MySQL database set up.
3. A web server like Apache or XAMPP.

### Steps:
1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/StreamSmart.git
   cd StreamSmart
   ```
2. Configure the database:
   - Import the provided `streamsmart.sql` file into your MySQL server.
   - Update `db_connection.php` with your database credentials.
3. Run the project on your local web server.
4. Access the application at `http://localhost/StreamSmart`.

---

## **Functionality**

### **User Functionalities:**
1. **Affordable OTT Subscriptions**:
   - Purchase premium subscriptions at reduced prices by joining a team.
2. **Profile Page**:
   - Displays personal details such as name, email, date of birth, gender.
   - Shows the total number of subscriptions purchased so far.
3. **Logout**:
   - Securely log out of the platform.

### **Admin Functionalities:**
1. **Subscription Management**:
   - Issue and assign OTT subscriptions to users as part of a team.
   - Manage subscriptions for YouTube and Spotify platforms.
2. **Expiring Subscriptions**:
   - View subscriptions expiring in the next 2 days.
   - Includes details like Team ID, Subscription ID, User Information, Issued and Expiry Dates.
3. **Platform-Specific Dashboards**:
   - Separate views for YouTube and Spotify subscriptions.

---

## **Usage**

1. **For Users**:
   - Sign in and navigate to the profile page to view personal details and subscription counts.
   - Purchase affordable subscriptions and enjoy OTT services with team-based plans.

2. **For Administrators**:
   - Sign in to the admin dashboard.
   - Issue subscriptions and manage teams.
   - Monitor expiring subscriptions and renew them as needed.

---

## **Future Enhancements**

- **Support for More OTT Platforms**:
  - Expand the platform to manage subscriptions for services like LionsGate Play, Zee5, SonyLiv, etc.
- **Automated Notifications**:
  - Notify users via email or SMS about expiring subscriptions.
- **Mobile App Integration**:
  - Create a mobile application for easier user and admin access.
- **Analytics Dashboard**:
  - Provide insights into user activity, subscription trends, and team performance.

---

## **Contributions**

Contributions are welcome! If you'd like to contribute, follow these steps:
1. Fork the repository.
2. Create a new branch:
   ```bash
   git checkout -b feature-name
   ```
3. Make your changes and commit:
   ```bash
   git commit -m "Added feature-name"
   ```
4. Push to the branch:
   ```bash
   git push origin feature-name
   ```
5. Create a Pull Request.

---

## **License**

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
