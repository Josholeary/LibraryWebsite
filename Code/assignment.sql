
#creating tables

CREATE TABLE Users
(
    username varchar(45) NOT NULL PRIMARY KEY,
    password varchar(6) NOT NULL,
    firstname varchar(30) NOT NULL,
    lastname varchar(30) NOT NULL,
    addressline1 varchar(45) NOT NULL,
    addressline2 varchar(45) NOT NULL,
    city varchar(20) NOT NULL,
    telephone int(10) NOT NULL,
    mobile int(10) NOT NULL
);


CREATE TABLE Category
(
	categoryid int(3) PRIMARY KEY,
	categorydesc varchar(25)
);


CREATE TABLE Books
(
	ISBN varchar(20) NOT NULL PRIMARY KEY,
	booktitle varchar(50) NOT NULL,
	author varchar(30) NOT NULL,
	edition int(3),
	year int(4),
	categoryid int(3),
	reserved varchar(1),
	CONSTRAINT FK_categoryid FOREIGN KEY (categoryid) REFERENCES Category(categoryid)
);


CREATE TABLE Reserved
(
	ISBN varchar(20) NOT NULL,
	username varchar(45) NOT NULL,
	reserveDate DATE,
	CONSTRAINT FK_IBSN FOREIGN KEY (ISBN) REFERENCES Books(ISBN),
	CONSTRAINT FK_username FOREIGN KEY (username) REFERENCES Users(username)
);

#inserting into Users table

INSERT INTO	Users (username, password, firstname, lastname, addressline1, addressline2, city, telephone, mobile)
VALUES ('alanjmkenna', 't1234s', 'Alan', 'McKenna', '38 Cranley Road', 'Fairview', 'Dublin', 9998377, 856625567);

INSERT INTO	Users (username, password, firstname, lastname, addressline1, addressline2, city, telephone, mobile)
VALUES ('joecrotty', 'kj7899','Joseph','Crotty', 'Apt 5 Clyde Road', 'Donnybrook','Dublin', 8887889, 876654456);

INSERT INTO	Users (username, password, firstname, lastname, addressline1, addressline2, city, telephone, mobile)
VALUES ('tommy100','123456', 'tom','behan', '14 Hyde Road', 'Dalkey','dublin', 9983747, 876738782);

#inserting into Category table

INSERT INTO Category(categoryid,categorydesc)
VALUES (001, 'Health');

INSERT INTO Category(categoryid,categorydesc)
VALUES (002, 'Business');

INSERT INTO Category(categoryid,categorydesc)
VALUES (003, 'Biography');

INSERT INTO Category(categoryid,categorydesc)
VALUES (004, 'Technology');

INSERT INTO Category(categoryid,categorydesc)
VALUES (005, 'Travel');

INSERT INTO Category(categoryid,categorydesc)
VALUES (006, 'Self-Help');

INSERT INTO Category(categoryid,categorydesc)
VALUES (007, 'Cookery');

INSERT INTO Category(categoryid,categorydesc)
VALUES (008, 'Fiction');

#inserting into Books table

INSERT INTO Books(ISBN, booktitle, author, edition, year, categoryid, reserved)
VALUES ('093-403992', 'Computers in business', 'Alicia Oneill', 3, 1997, 003, 'N');

INSERT INTO Books(ISBN, booktitle, author, edition, year, categoryid, reserved)
VALUES ('23472-8729', 'Exploring Peru', 'Stephanie Birchi', 4, 2005, 005, 'N');

INSERT INTO Books(ISBN, booktitle, author, edition, year, categoryid, reserved)
VALUES ('237-34823', 'Business Strategy', 'Joe Peppard', 2, 2002, 002, 'N');

INSERT INTO Books(ISBN, booktitle, author, edition, year, categoryid, reserved)
VALUES ('23u8-923849', 'A Guide to Nutrition', 'John Thorpe', 2, 1997, 001, 'N');

INSERT INTO Books(ISBN, booktitle, author, edition, year, categoryid, reserved)
VALUES ('2983-3494', 'Cooking for children', 'Anabelle Sharpe', 1, 2003, 007, 'N');

INSERT INTO Books(ISBN, booktitle, author, edition, year, categoryid, reserved)
VALUES ('82n8-308', 'computers for idiots', 'Susan ONeill', 5, 1998, 004, 'N');

INSERT INTO Books(ISBN, booktitle, author, edition, year, categoryid, reserved)
VALUES ('9823-23984','My life in pictures', 'Kevin Graham', 8, 2004, 001, 'N');

INSERT INTO Books(ISBN, booktitle, author, edition, year, categoryid, reserved)
VALUES ('9823-2403-0','DaVinci Code', 'Dan Brown', 1, 2003, 008, 'N');

INSERT INTO Books(ISBN, booktitle, author, edition, year, categoryid, reserved)
VALUES ('98234-029384', 'My Ranch in Texas', 'George Bush', 1, 2005, 001, 'Y');

INSERT INTO Books(ISBN, booktitle, author, edition, year, categoryid, reserved)
VALUES ('9823-98345', 'How to cook italian food', 'Jamie Oliver', 2, 2005, 007, 'Y');

INSERT INTO Books(ISBN, booktitle, author, edition, year, categoryid, reserved)
VALUES ('9823-98487', 'Optimising Your Business', 'Cleo Blair', 1, 2001, 002, 'N');

INSERT INTO Books(ISBN, booktitle, author, edition, year, categoryid, reserved)
VALUES('988745-234', 'Tara Road', 'Maeve Binchy', 4, 2002, 008, 'N');

INSERT INTO Books(ISBN, booktitle, author, edition, year, categoryid, reserved)
VALUES('993-004-00','My Life in Bits','John Smith',1,2001,001,'N');

#inserting into Reserved

INSERT INTO Reserved(ISBN,username,reserveDate)
VALUES('98234-029384','joecrotty','2008-10-11');

INSERT INTO Reserved(ISBN,username,reserveDate)
VALUES('9823-98345','tommy100','2008-10-11');





















