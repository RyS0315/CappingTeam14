DROP TABLE if exists USERS;
Create Table Users(
    userid Int(10) Primary KEY AUTO_INCREMENT,
    fname VARCHAR(20),
    lname VARCHAR(20),
    username VARCHAR(12),
    user_password VARCHAR(15),
    zipCode int(10),
    primary_religion Int(10),
    default_view VARCHAR(20),
    email VARCHAR(30),
    phone_number VARCHAR(15),
    pPicture VARCHAR(20),
    bPicture VARCHAR(20)
);

DROP TABLE if exists Prayer;
Create Table Prayer(
    prayid INT(10) Primary KEY AUTO_INCREMENT,
    userid Int(10),
    content VARCHAR(140),
    descript text,
    pray_status Int(1),
    exclusive Int(1),
    post_date datetime
);

Drop table if exists Prayer_Tag;
Create table Prayer_Tag(
    prayid INT(10),
    tagid INT(10),
    Primary KEY(prayid, tagid)
);

Drop table if exists Tag;
Create table Tag(
    tagid Int(10) Primary KEY AUTO_INCREMENT,
    tag_name Varchar(14)
);

Drop table if exists Prayer_Religion;
Create Table Prayer_Religion(
    prayid INT(10),
    relid Int(10),
    Primary Key(prayid, relid)
);

Drop table if exists Religion;
Create table Religion(
    relid Int(10) Primary key AUTO_INCREMENT,
    religion_name VARCHAR(30)
);

Drop table if exists User_Religion;
Create table User_Religion(
    userid INT(10),
    relid INT(10),
    repuation Int(10),
    Primary Key(userid, relid)
);

Insert into Religion(religion_name) VALUES
('Christianity'),
('Judaism'),
('Islam');

INSERT into USERS (fname,lname,username,user_password,zipCode,primary_religion, email,phone_number)VALUES
('Team', '14','Admin','Marist', 12601, 1, 'Admin@pray.com', '888-888-8888');