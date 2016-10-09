# WebCalendarProject
This is 3rd year project


How To make e-mail sending system work::
 In the copnsole type: sudo apt-get update
                       sudo apt-get install php5-curl



The good idea is to use PHP Framework:
https://fatfreeframework.com/user-guide


 Hi guys, I added the login and register pages. You can connect
 to the cloud9 database by initiating the database ( mysql-ctl cli )
 coomand in the terminal.
 
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
 
 
 
