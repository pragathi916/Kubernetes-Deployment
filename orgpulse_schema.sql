CREATE DATABASE IF NOT EXISTS orgpulse;
USE orgpulse;

CREATE TABLE registration (
    username VARCHAR(20) PRIMARY KEY,
    password VARCHAR(20),
    email VARCHAR(50),
    usertype VARCHAR(20)
);

CREATE TABLE login_details (
    username VARCHAR(20) PRIMARY KEY,
    password VARCHAR(20),
    login_time DATETIME,
    usertype VARCHAR(20),
    FOREIGN KEY (username) REFERENCES registration(username) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE patients (
    username VARCHAR(20) PRIMARY KEY,
    place VARCHAR(100),
    blood_group VARCHAR(10),
    contact VARCHAR(20),
    organ VARCHAR(10),
    age INT(3),
    usertype VARCHAR(20),
    FOREIGN KEY (username) REFERENCES registration(username) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE donor (
    username VARCHAR(20) PRIMARY KEY,
    place VARCHAR(100),
    blood_group VARCHAR(10),
    contact VARCHAR(20),
    organ VARCHAR(10),
    age INT(3),
    usertype VARCHAR(20),
    FOREIGN KEY (username) REFERENCES registration(username) ON DELETE CASCADE ON UPDATE CASCADE
);
