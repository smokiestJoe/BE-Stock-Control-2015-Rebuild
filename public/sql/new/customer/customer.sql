CREATE TABLE `customer` (
    ID int NOT NULL AUTO_INCREMENT,
    first_name varchar(255) NOT NULL,
    last_name varchar(255) NOT NULL,
    PRIMARY KEY (ID)
);

INSERT INTO `customer` (`first_name`, `last_name`) VALUES
('Bill', 'Preston'),
('Ted', 'Logan'),
('Wayne', 'Campbell'),
('Garth', 'Elgar');
