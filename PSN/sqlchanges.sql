DROP TABLE IF EXISTS Religion;
CREATE TABLE Religion(
    relid INT(10) PRIMARY KEY AUTO_INCREMENT,
    religion_name VARCHAR(30)
);

DROP TABLE IF EXISTS Users;
CREATE TABLE Users(
    userid INT(10) PRIMARY KEY AUTO_INCREMENT,
    fname VARCHAR(20),
    lname VARCHAR(20),
    username VARCHAR(12),
    user_password VARCHAR(15),
    zipCode INT(10),
    Primary_religion INT(10),
    default_view VARCHAR(20),
    email VARCHAR(30),
    phone_number VARCHAR(15),
    pPicture VARCHAR(20),
    bPicture VARCHAR(20),
    CONSTRAINT FK_Users_Religion FOREIGN KEY (Primary_religion) REFERENCES Religion (relid)
);

DROP TABLE IF EXISTS Tag;
CREATE TABLE Tag(
    tagid INT(10) PRIMARY KEY AUTO_INCREMENT,
    tag_name VARCHAR(14)
);

DROP TABLE IF EXISTS Prayer;
CREATE TABLE Prayer(
    prayid INT(10) PRIMARY KEY AUTO_INCREMENT,
    userid INT(10),
    content VARCHAR(140),
    descript TEXT,
    pray_status INT(1),
    exclusive INT(1),
    post_date DATETIME,
    CONSTRAINT FK_Users_Prayer FOREIGN KEY (userid) REFERENCES Users (userid)
);

DROP TABLE IF EXISTS Prayer_Tag;
CREATE TABLE Prayer_Tag(
    prayid INT(10),
    tagid INT(10),
    PRIMARY KEY(prayid, tagid),
    CONSTRAINT FK_Prayer_PrayerTag FOREIGN KEY (prayid) REFERENCES Prayer (prayid),
    CONSTRAINT FK_Tag_PrayerTag FOREIGN KEY (tagid) REFERENCES Tag (tagid)
);

DROP TABLE IF EXISTS Prayer_Religion;
CREATE TABLE Prayer_Religion(
    prayid INT(10),
    relid INT(10),
    PRIMARY KEY(prayid, relid),
    CONSTRAINT FK_Prayer_PrayerReligion FOREIGN KEY (prayid) REFERENCES Prayer (prayid),
    CONSTRAINT FK_Religion_PrayerReligion FOREIGN KEY (relid) REFERENCES Religion (relid)
);


DROP TABLE IF EXISTS User_Religion;
CREATE TABLE User_Religion(
    userid INT(10),
    relid INT(10),
    repuation INT(10),
    PRIMARY KEY(userid, relid),
    CONSTRAINT FK_User_UserReligion FOREIGN KEY (userid) REFERENCES Users (userid),
    CONSTRAINT FK_Religion_UserReligion FOREIGN KEY (relid) REFERENCES Religion (relid)
);

DROP TABLE IF EXISTS Notifications;
CREATE TABLE Notifications(
    nid INT(10) PRIMARY KEY AUTO_INCREMENT,
    userid1 INT(10),
    userid2 INT(10),
    type VARCHAR(10),
    isChecked INT(1),
    CONSTRAINT FK_User1_Notifications FOREIGN KEY (userid1) REFERENCES Users (userid),
    CONSTRAINT FK_User2_Notifications FOREIGN KEY (userid2) REFERENCES Users (userid)
);

DROP TABLE IF EXISTS Likes;
CREATE TABLE Likes(
    userid INT(10),
    prayid INT(10),
    PRIMARY KEY(userid, prayid),
    CONSTRAINT FK_User_Likes FOREIGN KEY (userid) REFERENCES Users (userid),
    CONSTRAINT FK_Prayer_Likes FOREIGN KEY (prayid) REFERENCES Prayer (prayid)
);

DROP TABLE IF EXISTS Comment;
CREATE TABLE Comment(
    commid INT(10) PRIMARY KEY AUTO_INCREMENT,
    userid INT(10),
    prayid INT(10),
    comment VARCHAR(5000),
    CONSTRAINT FK_User_Comment FOREIGN KEY (userid) REFERENCES Users (userid),
    CONSTRAINT FK_Prayer_Comment FOREIGN KEY (prayid) REFERENCES Prayer (prayid)
);

DROP TABLE IF EXISTS Message;
CREATE TABLE Message(
    messageid INT(10) PRIMARY KEY AUTO_INCREMENT,
    userid1 INT(10),
    userid2 INT(10),
    message VARCHAR(5000),
    image VARCHAR(5000),
    CONSTRAINT FK_User1_Message FOREIGN KEY (userid1) REFERENCES Users (userid),
    CONSTRAINT FK_User2_Message FOREIGN KEY (userid2) REFERENCES Users (userid)
);

INSERT INTO Religion(religion_name) VALUES
('Christianity'),
('Judaism'),
('Islam');

INSERT INTO USERS (fname,lname,username,user_password,zipCode,Primary_religion, email,phone_number)VALUES
('Team', '14','Admin','Marist', 12601, 1, 'Admin@pray.com', '888-888-8888');
