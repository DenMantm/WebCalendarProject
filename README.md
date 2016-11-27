CHANGING MAIN APACHE CONFIG FILE::::

type in the console:
sudo vi /etc/apache2/sites-enabled/001-cloud9.conf

After press insert,

Find DocumentRoot and replace it with /home/ubuntu/workspace/www

Then press Esc
Then press :wq!
Then Enter

# WebCalendarProject
This is 3rd year project

\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
How To make e-mail sending system work::
 In the copnsole type: sudo apt-get update
                       sudo apt-get install php5-curl
                       sudo service apache2 restart
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

The good idea is to use PHP Framework:
https://fatfreeframework.com/user-guide

\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

 Hi guys, I added the login and register pages. You can connect
 to the cloud9 database by initiating the database ( mysql-ctl cli )
 coomand in the terminal.
 
 this will get you accessed to clod9 sql and see all the databases. 
 
 * Create a database for your project named( calendar).
 
 * create a table in that database named (user ).
 
 * populate the table with this query:
 * (Dont forget to create database, then create user on database, then grant all access rights to new database to that user)
 * 
 


 // This is the DDL for the user table
 
                         
                           CREATE TABLE IF NOT EXISTS `user` (
                                                  `id` int(11) NOT NULL AUTO_INCREMENT,
                                                  `email_verified` int(1) DEFAULT 0,
                                                  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                                                  `password` char(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                                                  `email` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                                                  `salt` char(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                                                  `msg` text NOT NULL,
                                                  PRIMARY KEY (`id`)
                                                
                                                ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;


* go to common.php and change my username with yours and you are good to go
 
 

// This is the DDL for the task table

CREATE TABLE IF NOT EXISTS `task` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `task_date` timestamp default current_timestamp ON UPDATE CURRENT_TIMESTAMP,
              `task_note` varchar (255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                
     PRIMARY KEY (`id`),
                 ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

 
Tutorials{
    
    
    // http://webslesson.blogspot.ie/2016/10/ajax-with-php-mysql-date-range-search-using-jquery-datepicker.html
	//sanitize post value, PHP filter FILTER_SANITIZE_NUMBER_INT removes all characters except digits, plus and minus sign.
	http://www.itechempires.com/2016/07/pdo-crud-operations-using-php-bootstrap/
}