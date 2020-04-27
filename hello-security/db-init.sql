CREATE DATABASE IF NOT EXISTS `hello-security`;

use `hello-security`;

create table Person (email varchar(255), firstname varchar(255), password varchar(255), role varchar(255));

INSERT INTO person (email, firstname, password, role) 
VALUES ('asdf@asd', 'kir4o', '$2y$10$r3nM7fh6BYXCWQk/sqyWn.ETi6dSjqO0uZtYG4k/Xm34ln4YgRkKa', 'student'); #password: pass
INSERT INTO person (email, firstname, password, role) 
VALUES ('email@lll', 'k2', '$2y$10$mYdzM2J7OsF2eD7S04eAxuACOMyDOGSBkytuv4VZGDxXRS2dfaQ2a', 'teacher'); #password: ddd

ALTER TABLE Person
ADD UNIQUE (email);

ALTER TABLE Person
MODIFY firstname varchar(255) NOT NULL;

ALTER TABLE Person
MODIFY password varchar(255) NOT NULL;

ALTER TABLE Person
MODIFY role varchar(255) NOT NULL;