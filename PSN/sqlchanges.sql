DROP TABLE if exists USERS;
Create Table Users(
    userid Int(10) Primary KEY AUTO_INCREMENT,
    first_name VARCHAR(20),
    last_name VARCHAR(20),
    username VARCHAR(12),
    user_password VARCHAR(15)
);

INSERT into USERS (first_name,last_name,username,user_password)VALUES
('Team', '14','Admin','Marist');