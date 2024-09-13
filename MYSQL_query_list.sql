CREATE DATABASE users;

CREATE TABLE employees (
    ID int NOT NULL,
    LastName varchar(255) NOT NULL,
    FirstName varchar(255) NOT NULL,
    bio TEXT
);
SHOW DATABASES;
use users;
SHOW columns from employees;
INSERT INTO employees(username, id, bio)
VALUES
    ("elliot", 1, "works in manufacturing"),
    ("oliver", 2, "works in HR");

SELECT * from employees;
