DROP TABLE IF EXISTS Religions;
CREATE TABLE Religions(
    relid INT(10) PRIMARY KEY AUTO_INCREMENT,
    religion_name VARCHAR(30),
    dateLastMaint DATETIME DEFAULT CURRENT_TIMESTAMP,
    dateAdded DATETIME DEFAULT CURRENT_TIMESTAMP
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
    dateLastMaint DATETIME DEFAULT CURRENT_TIMESTAMP,
    dateAdded DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT FK_Users_Religions FOREIGN KEY (Primary_religion) REFERENCES Religions (relid)
);

DROP TABLE IF EXISTS Tags;
CREATE TABLE Tags(
    tagid INT(10) PRIMARY KEY AUTO_INCREMENT,
    tag_name VARCHAR(14),
    dateLastMaint DATETIME DEFAULT CURRENT_TIMESTAMP,
    dateAdded DATETIME DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS Prayers;
CREATE TABLE Prayers(
    prayid INT(10) PRIMARY KEY AUTO_INCREMENT,
    userid INT(10),
    content VARCHAR(140),
    descript TEXT,
    pray_status INT(1),
    exclusive INT(1),
    post_date DATETIME,
    img VARCHAR(15),
    dateLastMaint DATETIME DEFAULT CURRENT_TIMESTAMP,
    dateAdded DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT FK_Users_Prayer FOREIGN KEY (userid) REFERENCES Users (userid)
);

DROP TABLE IF EXISTS Prayer_Tags;
CREATE TABLE Prayer_Tags(
    prayid INT(10),
    tagid INT(10),
    PRIMARY KEY(prayid, tagid),
    dateLastMaint DATETIME,
    dateAdded DATETIME,
    CONSTRAINT FK_Prayer_PrayerTags FOREIGN KEY (prayid) REFERENCES Prayers (prayid),
    CONSTRAINT FK_Tag_PrayerTags FOREIGN KEY (tagid) REFERENCES Tags (tagid)
);

DROP TABLE IF EXISTS Prayer_Religions;
CREATE TABLE Prayer_Religions(
    prayid INT(10),
    relid INT(10),
    PRIMARY KEY(prayid, relid),
    dateLastMaint DATETIME DEFAULT CURRENT_TIMESTAMP,
    dateAdded DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT FK_Prayer_PrayerReligions FOREIGN KEY (prayid) REFERENCES Prayers (prayid),
    CONSTRAINT FK_Religion_PrayerReligions FOREIGN KEY (relid) REFERENCES Religions (relid)
);


DROP TABLE IF EXISTS User_Religions;
CREATE TABLE User_Religions(
    userid INT(10),
    relid INT(10),
    repuation INT(10),
    PRIMARY KEY(userid, relid),
    dateLastMaint DATETIME DEFAULT CURRENT_TIMESTAMP,
    dateAdded DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT FK_User_UserReligion FOREIGN KEY (userid) REFERENCES Users (userid),
    CONSTRAINT FK_Religion_UserReligion FOREIGN KEY (relid) REFERENCES Religions (relid)
);

DROP TABLE IF EXISTS Notifications;
CREATE TABLE Notifications(
    nid INT(10) PRIMARY KEY AUTO_INCREMENT,
    userid1 INT(10),
    userid2 INT(10),
    type VARCHAR(10),
    isChecked INT(1),
    dateLastMaint DATETIME DEFAULT CURRENT_TIMESTAMP,
    dateAdded DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT FK_User1_Notifications FOREIGN KEY (userid1) REFERENCES Users (userid),
    CONSTRAINT FK_User2_Notifications FOREIGN KEY (userid2) REFERENCES Users (userid)
);

DROP TABLE IF EXISTS Likes;
CREATE TABLE Likes(
    userid INT(10),
    prayid INT(10),
    PRIMARY KEY(userid, prayid),
    dateLastMaint DATETIME DEFAULT CURRENT_TIMESTAMP,
    dateAdded DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT FK_User_Likes FOREIGN KEY (userid) REFERENCES Users (userid),
    CONSTRAINT FK_Prayer_Likes FOREIGN KEY (prayid) REFERENCES Prayer (prayid)
);

DROP TABLE IF EXISTS Comment;
CREATE TABLE Comment(
    commid INT(10) PRIMARY KEY AUTO_INCREMENT,
    userid INT(10),
    prayid INT(10),
    comment VARCHAR(5000),
    dateLastMaint DATETIME DEFAULT CURRENT_TIMESTAMP,
    dateAdded DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT FK_User_Comments FOREIGN KEY (userid) REFERENCES Users (userid),
    CONSTRAINT FK_Prayer_Comments FOREIGN KEY (prayid) REFERENCES Prayers (prayid)
);

DROP TABLE IF EXISTS Messages;
CREATE TABLE Message(
    messageid INT(10) PRIMARY KEY AUTO_INCREMENT,
    userid1 INT(10),
    userid2 INT(10),
    message VARCHAR(5000),
    image VARCHAR(5000),
    dateLastMaint DATETIME DEFAULT CURRENT_TIMESTAMP,
    dateAdded DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT FK_User1_Messages FOREIGN KEY (userid1) REFERENCES Users (userid),
    CONSTRAINT FK_User2_Messages FOREIGN KEY (userid2) REFERENCES Users (userid)
);

Insert into Religions(religion_name) VALUES
('Admin Updates'),
('Christianity'),
('Judaism'),
('Islam'),
('Buddhism'),
('Hinduism');

INSERT INTO USERS (fname,lname,username,user_password,zipCode,primary_religion, email,phone_number)VALUES
('P.R.A.Y', 'Admin','Admin','Marist', 12601, 1, 'Admin@pray.com', '888-888-8888'),
('Test', 'User', 'TestUser', 'Marist', 12601, 1, 'TestUser@pray.com', '888-777-66666');

INSERT INTO Prayers(userid, content)VALUES
(1,'Welcome to P.R.A.Y');

INSERT INTO Prayer_Religions(prayid, relid)
VALUES(1,1);
