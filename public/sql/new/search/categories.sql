CREATE TABLE `categories` (
    ID int NOT NULL AUTO_INCREMENT,
    category varchar(255) NOT NULL,
    PRIMARY KEY (ID),
    UNIQUE KEY (`category`)
);

INSERT INTO `categories` (`category`) values
('components'),
('computing'),
('displays'),
('mobile'),
('networking'),
('peripherals'),
('portable_storage'),
('imaging');