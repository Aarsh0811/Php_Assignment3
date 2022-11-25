/* NAME: AARSH PARIMAL PATEL
STUDENT ID: 200520260
ASSIGNMENT-3 */

/* The code below is for the sql of our website */

/* Creating our table for profile*/

/* adding the variables to our table which will input data according to its type*/

CREATE TABLE Profile_Record(
ID int(11) AUTO_INCREMENT PRIMARY KEY,
FullName varchar(100) NOT NULL,
Email varchar(50) NOT NULL,
PhoneNumber char(10) NOT NULL,
Profession varchar(100) NOT NULL,
Birthdate DATE NOT NULL,
Address varchar(300) NOT NULL,
Bio varchar(500) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

/*end of the code for our sql */
