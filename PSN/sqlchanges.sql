DROP TABLE IF EXISTS Users;
CREATE TABLE Users(
    userid INT(10) PRIMARY KEY AUTO_INCREMENT,
    fname VARCHAR(20),
    lname VARCHAR(20),
    username VARCHAR(12),
    user_password VARCHAR(15),
    zipCode INT(10),
    primary_religion INT(10),
    default_view VARCHAR(20),
    email VARCHAR(30),
    phone_number VARCHAR(15)
);

DROP TABLE IF EXISTS Prayer;
CREATE TABLE Prayer(
    prayid INT(10) PRIMARY KEY AUTO_INCREMENT,
    userid INT(10),
    content VARCHAR(140),
    descript TEXT,
    pray_status INT(1),
    exclusive INT(1),
    post_date DATETIME
);

DROP TABLE IF EXISTS Prayer_Tag;
CREATE TABLE Prayer_Tag(
    prayid INT(10),
    tagid INT(10),
    PRIMARY KEY(prayid, tagid)
);

DROP TABLE IF EXISTS Tag;
CREATE TABLE Tag(
    tagid INT(10) PRIMARY KEY AUTO_INCREMENT,
    tag_name VARCHAR(14)
);

DROP TABLE IF EXISTS Prayer_Religion;
CREATE TABLE Prayer_Religion(
    prayid INT(10),
    relid INT(10),
    PRIMARY KEY(prayid, relid)
);

DROP TABLE IF EXISTS Religion;
CREATE TABLE Religion(
    relid INT(10) PRIMARY KEY AUTO_INCREMENT,
    religion_name VARCHAR(30)
);

DROP TABLE IF EXISTS User_Religion;
CREATE TABLE User_Religion(
    userid INT(10),
    relid INT(10),
    repuation INT(10),
    PRIMARY KEY(userid, relid)
);

INSERT INTO Religion(religion_name) VALUES
('Christianity'),
('Judaism'),
('Islam');

INSERT INTO USERS (fname,lname,username,user_password,zipCode,primary_religion, email,phone_number)VALUES
('Team', '14','Admin','Marist', 12601, 1, 'Admin@psn.com', '888-888-8888');
