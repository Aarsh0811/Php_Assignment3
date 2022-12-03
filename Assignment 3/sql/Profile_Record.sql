/* NAME: AARSH PARIMAL PATEL
STUDENT ID: 200520260
ASSIGNMENT-3 */

/* The code below is for the sql of our website */

/* Creating our table for profile*/

/* adding the variables to our table which will input data according to its type*/

CREATE TABLE Profile_Record(
id int(11) AUTO_INCREMENT PRIMARY KEY,
fullname varchar(100) NOT NULL,
email varchar(50) NOT NULL,
phonenum char(10) NOT NULL,
profession varchar(100) NOT NULL,
birthdate DATE NOT NULL,
address varchar(300) NOT NULL,
bio varchar(500) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

/*end of the code for our sql */
