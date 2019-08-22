create database fone;
use fone;

create table drivers(
  driver_id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  PRIMARY KEY(driver_id)
);

create table countries(
    country_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    tag VARCHAR(10) NOT NULL,
    PRIMARY KEY(country_id)
);

create table teams(
  team_id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  tag VARCHAR(10) NOT NULL,
  PRIMARY KEY(team_id)
);
