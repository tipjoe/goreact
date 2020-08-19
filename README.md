# GoREACT Project

This project demonstrates the requirements defined at https://gitlab.goreact.com/GoREACT/applicant-project. 

## Assumptions and Thought Process
You have access to a computer with PHP 7.2+ installed. 

This is a "prototype" tested and functioning in Google Chrome and iOS Safari 
(used valet's share feature to view a grok URL on my phone).

I chose not to use a front-end framework because: 1) When you said you use AngularJS,
I interpreted that as Angular 1.x, which I'm rusty with, 2) Unless I have a specific 
reason to use a tool to meet the requirement, I prefer to keep the code lighter and 
simpler.

Lastly, I spent about three hours on core requirements. But I was having fun and spent 
another two to three on the "extra credit". I lost some time second-guessing
my decision to not use the database. 

I shortly considered creating a Docker image that you could just download and run. But 
with the time constraints, that seemed like overkill. 

Enjoy!

## How to Install
1. In a terminal, run git clone @todo url
2. cd into goreact/public
3. Enter <code>php -S localhost:8000</code> to test with the built-in PHP web server
4. Open your browser (preferrably Google Chrome) and go to localhost:8000 to run the application

Note: I intentionally chose to emulate the database with sessions to make this setup really simple. 

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
