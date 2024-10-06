# Blood Bank Management System

Welcome to the Blood Bank Management System repository! This project is designed to streamline and manage the operations of a blood bank, ensuring efficient handling of blood donations, inventory, and requests.

## Features

- **Donor Management**: Register and manage blood donors with their details and blood types.
- **Inventory Management**: Track the availability of different blood types in the blood bank.
- **Request Handling**: Manage requests for blood from hospitals and individuals.
- **Notifications**: Alert donors and administrators about donation schedules and inventory needs.
- **Reporting**: Generate reports on blood donations, inventory status, and request fulfillment.

## Installation

1. **Clone the repository**:
    ```bash
    git clone https://github.com/rejish7/Management-of-Blood-Bank.git
    cd Management-of-Blood-Bank
    ```

2. **Set up the web server**:
    - Ensure you have a running instance of Apache or Nginx.
    - Install PHP and MySQL.

3. **Set up the database**:
    - Create a database named `blood_bank`.
    - Import the provided SQL script (`database.sql`) to set up the tables.

4. **Configure environment variables**:
    - Rename the `.env.example` file to `.env`.
    - Add your database credentials and other necessary configurations.

5. **Install dependencies**:
    ```bash
    composer install
    ```

6. **Run the application**:
    - Start your web server.
    - Access the application via `http://localhost/Management-of-Blood-Bank`.

## Usage

- **Admin Panel**: Access the admin panel to manage donors, inventory, and requests.
- **Donor Portal**: Donors can log in to view their donation history and upcoming donation schedules.
- **Request Portal**: Hospitals and individuals can request blood and track the status of their requests.

## Contributing

We welcome contributions! Please follow these steps to contribute:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make your changes and commit them (`git commit -m 'Add new feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Open a pull request.

## License

This project is licensed under the MIT License. See the LICENSE file for details.

## Contact

For any questions or suggestions,feel free.