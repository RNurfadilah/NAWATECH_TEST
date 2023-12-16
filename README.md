NAWATECH Test Project

Installation
Follow these steps to set up the project on your local machine:

Prerequisites
PHP >= 7.3
Composer
Laravel

Steps
1. Clone the Repository:
git clone https://github.com/RNurfadilah/NAWATECH_TEST.git

2. Navigate to the Project Directory:
cd NAWATECH_TEST

3. Install Dependencies:
composer install

4. Set Up Environment File:
If you don't have a .env file, copy the .env.example file and rename it to .env.
Set up your environment variables in the .env file, if necessary.

5. Generate Application Key:
php artisan key:generate

6. Start the Laravel Server:
php artisan serve
This will start the development server, typically at http://localhost:8000.

Accessing the API Endpoint
The project includes an API endpoint that merges and transforms JSON data from two sources.

Endpoint Details
URL: /api/transform-data
Method: GET

Using the Endpoint
1. Start the Laravel Server (if not already running): 
php artisan serve

2. Access the Endpoint:
You can access the endpoint by navigating to http://localhost:8000/api/transform-data in your web browser 

or using tools like Postman or cURL. Example using cURL:
curl http://localhost:8000/api/transform-data