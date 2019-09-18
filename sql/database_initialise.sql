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

create table seasons(
  season_id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  PRIMARY KEY(season_id)
);

create table races(
  race_id INT NOT NULL AUTO_INCREMENT,
  driver_id INT NOT NULL,
  country_id INT NOT NULL,
  team_id INT NOT NULL,
  season_id INT NOT NULL,
  points INT NOT NULL,
  PRIMARY KEY(race_id)
);

ALTER TABLE races
  ADD CONSTRAINT `FK_driver` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`driver_id`);
ALTER TABLE races
  ADD CONSTRAINT `FK_country` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`);
ALTER TABLE races
  ADD CONSTRAINT `FK_team` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_id`);
ALTER TABLE races
  ADD CONSTRAINT `FK_season` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`season_id`);
