CREATE DATABASE 0920_dojo4;
USE 0920_dojo4;

CREATE TABLE `user` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
);

CREATE TABLE `role` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `name` varchar(255) NOT NULL
);

ALTER TABLE user ADD CONSTRAINT FK_user_role FOREIGN KEY (role_id) REFERENCES role (id);

INSERT INTO role (`name`) VALUES ('ADMIN') , ('USER');