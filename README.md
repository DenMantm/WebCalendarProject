# WebCalendarProject
This is 3rd year project

1.	Fill project Proposal Template
2.	Fill SPRINT CYCLE Template
3.	Create GitHub Repository
4.	Start to create Mockups
5.	Set Up basic Login System:
a.	Generate basic index page
b.	Connect Web Site to database
6.	Fill Requirements Specification Template
7.	Create basic calendar layout
8.	Create functionality of putting tasks into calendar
9.	Create functionality of adding notes to tasks
10.	Create e-mail sending system module
11.	Add functionality of creating group calendars
12.	Fill Technical Report Template


 Hi guys, I added the login and register pages. You can connect to the cloud9 database by initiating the database ( mysql-ctl cli ) coomand in the terminal.
 
 this will get you accessed to clod9 sql and see all the databases. 
 
 * Create a database for your project named( calendar).
 
 * create a table in that database named (user ).
 
 * populate the table with this query:
 * (Dont forget to create database, then create user on database, then grant all access rights to new database to that user)
 
                                                    CREATE TABLE IF NOT EXISTS `user` (
                                                  `id` int(11) NOT NULL AUTO_INCREMENT,
                                                  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                                                  `password` char(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                                                  `email` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                                                  `salt` char(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                                                  `msg` text NOT NULL,
                                                  PRIMARY KEY (`id`)
                                                
                                                ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;


* go to common.php and change my username with yours and you are good to go
 
 
 