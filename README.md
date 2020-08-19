# GoREACT Project

This project demonstrates the requirements defined at https://gitlab.goreact.com/GoREACT/applicant-project. 

## Assumptions and Thought Process
This project assumes you have a computer with:

* PHP 7.2+
* composer
* npm
* git

This was tested and functioning in Google Chrome and iOS Safari 
(used valet's share feature to view a grok URL on my phone). 

I made two explicit choices:

1. No database - Make it drop-dead simple to try out.
2. No front-end framework - without a requirement to justify an extra layer of
code, I prefer keeping the code more clean and simple. 

Enjoy!

## How to Install
1. In a terminal, run <code>git clone git@github.com:tipjoe/goreact.git</code>
2. If you're in a *nix environment (Mac, Linux), just cd into the goreact folder, run the shell script with <code>./setup.sh</code> THEN SKIP TO STEP 4.
3. SKIP THIS UNLESS YOU'RE ON WINDOWS. If you're on Windows, manually complete these remaining steps that assume you're still in the goreact directory.
* <code>composer install</code>
* <code>npm install</code>
* <code>cp .env.example .env</code> to generate your environment variable file
* <code>php artisan key:generate</code> to generate your unique app key
* <code>php artisan storage:link</code> to map storage/app/public to public/storage 
* <code>cd public</code>
* <code>php -S localhost:8000</code> to test with the built-in PHP web server

4. Now just open your browser (preferrably Google Chrome) and go to localhost:8000 to run the application.

To stop the local web server, just hit Ctrl-C at the terminal. To restart ensure 
you're in the goreact/public folder and enter <code>php -S localhost:8000</code>

Note 1: I intentionally chose to emulate the database with sessions to keep this setup more simple. 

Note 2: If I were trying to share this with a less technical audience or an audience 
who may not already have typical LAMP environment already installed, I would either write a 
startup shell script to install the prerequisites or Dockerize this. 

## How to Run the Tests
1. In terminal, cd into the goreact folder
2. Run <code>php artisan test</code>. If you have phpunit installed globally, you can also run tests by just entering <code>phpunit</code> in the same folder.

## Extra Credit
1. User Authentication - Note the Laravel Auth scaffolding is present, but not implemented since I chose not to 
use a database.

2. Cloud Storage - Using Laravel file storage features, it's simple to configure to use S3 instead of local disk
by updating config/filesystems.php and adding AWS credentials in the .env file. Like the database
I chose to minimize setup steps, but wanted to describe my thinking. 

3. File Metadata - Did this using the PHP session to store and a caption.  
If I were using a database, I would have created a File model and a migration 
for a files table. 

4. Responsive - Uses Bootstrap.

5. PDF, Video, and JPG Preview - Found a jquery lightbox plugin that handled all three
file types. It only worked in Chrome and iOS Safari. Good option for a quick
prototype. In a real scenario, we would want to stream the video and probably 
do other mime type specific optimizations.  
