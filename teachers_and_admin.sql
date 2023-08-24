-- for creating an admin
INSERT INTO users(username,password,role) VALUES('admin','admin','admin');

-- for creating teachers

-- teacher 1
INSERT INTO users(username,password,role) VALUES('teacher1','teacher','teacher');
SET @last_inserted_id = LAST_INSERT_ID();
INSERT INTO teachers(firstname,lastname,staffno,userid) VALUES('Lucy','Mboya','34511',@last_inserted_id);

-- teacher 2
INSERT INTO users(username,password,role) VALUES('teacher2','teacher','teacher');
SET @last_inserted_id = LAST_INSERT_ID();
INSERT INTO teachers(firstname,lastname,staffno,userid) VALUES('Alex','Muntu','302',@last_inserted_id);

-- teacher 3
INSERT INTO users(username,password,role) VALUES('teacher3','teacher','teacher');
SET @last_inserted_id = LAST_INSERT_ID();
INSERT INTO teachers(firstname,lastname,staffno,userid) VALUES('Casey','Moran','465',@last_inserted_id);