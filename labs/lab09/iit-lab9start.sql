-- create the tables for our movies
CREATE TABLE `movies` (
   `movieid` int(10) unsigned NOT NULL AUTO_INCREMENT,
   `title` varchar(100) NOT NULL,
   `year` char(4) DEFAULT NULL,
   PRIMARY KEY (`movieid`)
);

-- create the table for our actors
CREATE TABLE `actors` (
   `actorid` int(10) unsigned NOT NULL AUTO_INCREMENT,
   `last_name` varchar(100) NOT NULL,
   `first_names` varchar(100) NOT NULL,
   `dob` date DEFAULT NULL,
   PRIMARY KEY (`actorid`)
);

-- relationship table
CREATE TABLE `movie_actor` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `movieid` INT UNSIGNED NOT NULL,
    `actorid` INT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (movieid) REFERENCES movies(movieid),
    FOREIGN KEY (actorid) REFERENCES actors(actorid)
);

-- insert data into the tables
INSERT INTO movies
VALUES (1, "Elizabeth", "1998"),
   (2, "Black Widow", "2021"),
   (3, "Oh Brother Where Art Thou?", "2000"),
   (
      4,
      "The Lord of the Rings: The Fellowship of the Ring",
      "2001"
   ),
   (5, "Up in the Air", "2009");

INSERT INTO actors
VALUES (1, "Holland", "Tom", "1996-06-01"),
   (2, "Hanks", "Tom", "1956-07-09"),
   (3, "Cruise", "Tom", "1959-07-03"),
   (4, "Freeman", "Morgan", "1950-05-02"),
   (5, "Pitt", "Brad", "1940-12-10");

INSERT INTO movie_actor (movieid, actorid) VALUES
(1, 2),
(2, 1),
(3, 3),
(4, 4),
(5, 5);

