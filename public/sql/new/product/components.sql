CREATE TABLE `components` (
    ID int NOT NULL AUTO_INCREMENT,
    component varchar(255) NOT NULL,
    PRIMARY KEY (ID),
    UNIQUE KEY (`component`)
);

INSERT INTO `components` (`component`) VALUES
('motherboard'),
('processor'),
('memory'),
('internal_hard_disk'),
('internal_solid_disk'),
('power_supply'),
('pc_case'),
('case_fan'),
('heatsink'),
('graphics_card'),
('sound_card');


--CREATE TABLE company (
--  ID int NOT NULL AUTO_INCREMENT,
--  manufacturer varchar(255) NOT NULL,
--  PRIMARY KEY (ID)
--);


-- protected $productId;
--
--    protected $productModelNumber;
--
--    protected $productManufacturer;
--
--    protected $productName;
--
--    protected $productImageFolderLink;
--
--    protected $description;

-- COMPONENTS

CREATE TABLE `motherboard` (
    ID int NOT NULL AUTO_INCREMENT,
    model_number varchar(255) NOT NULL,
    company varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    image_folder varchar(255) NOT NULL,
    description varchar(255) NOT NULL,
    category varchar(255) NOT NULL,
    color varchar(20),
    EAN varchar(255),
    PRIMARY KEY (ID),
    FOREIGN KEY (`company`) REFERENCES company(`manufacturer`),
    FOREIGN KEY (`category`) REFERENCES categories(`category`),
    FOREIGN KEY (`model_number`) REFERENCES stocked_skus(`model_number`),
    UNIQUE KEY (`model_number`)
);

CREATE TABLE `processor` (
    ID int NOT NULL AUTO_INCREMENT,
    model_number varchar(255) NOT NULL,
    company varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    image_folder varchar(255) NOT NULL,
    description varchar(255) NOT NULL,
    category varchar(255) NOT NULL,
    color varchar(20),
    EAN varchar(255),
    PRIMARY KEY (ID),
    FOREIGN KEY (`company`) REFERENCES company(`manufacturer`),
    FOREIGN KEY (`category`) REFERENCES categories(`category`),
    FOREIGN KEY (`model_number`) REFERENCES stocked_skus(`model_number`),
    UNIQUE KEY (`model_number`)
);



CREATE TABLE `internal_hard_disk` (
    ID int NOT NULL AUTO_INCREMENT,
    model_number varchar(255) NOT NULL,
    company varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    image_folder varchar(255) NOT NULL,
    description varchar(255) NOT NULL,
    category varchar(255) NOT NULL,
    color varchar(20),
    EAN varchar(255),
    PRIMARY KEY (ID),
    FOREIGN KEY (`company`) REFERENCES company(`manufacturer`),
    FOREIGN KEY (`category`) REFERENCES categories(`category`),
    FOREIGN KEY (`model_number`) REFERENCES stocked_skus(`model_number`),
    UNIQUE KEY (`model_number`)
);

CREATE TABLE `internal_solid_disk` (
    ID int NOT NULL AUTO_INCREMENT,
    model_number varchar(255) NOT NULL,
    company varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    image_folder varchar(255) NOT NULL,
    description varchar(255) NOT NULL,
    category varchar(255) NOT NULL,
    color varchar(20),
    EAN varchar(255),
    PRIMARY KEY (ID),
    FOREIGN KEY (`company`) REFERENCES company(`manufacturer`),
    FOREIGN KEY (`category`) REFERENCES categories(`category`),
    FOREIGN KEY (`model_number`) REFERENCES stocked_skus(`model_number`),
    UNIQUE KEY (`model_number`)
);

CREATE TABLE `power_supply` (
    ID int NOT NULL AUTO_INCREMENT,
    model_number varchar(255) NOT NULL,
    company varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    image_folder varchar(255) NOT NULL,
    description varchar(255) NOT NULL,
    category varchar(255) NOT NULL,
    color varchar(20),
    EAN varchar(255),
    PRIMARY KEY (ID),
    FOREIGN KEY (`company`) REFERENCES company(`manufacturer`),
    FOREIGN KEY (`category`) REFERENCES categories(`category`),
    FOREIGN KEY (`model_number`) REFERENCES stocked_skus(`model_number`),
    UNIQUE KEY (`model_number`)
);

CREATE TABLE `pc_case` (
    ID int NOT NULL AUTO_INCREMENT,
    model_number varchar(255) NOT NULL,
    company varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    image_folder varchar(255) NOT NULL,
    description varchar(255) NOT NULL,
    category varchar(255) NOT NULL,
    color varchar(20),
    EAN varchar(255),
    PRIMARY KEY (ID),
    FOREIGN KEY (`company`) REFERENCES company(`manufacturer`),
    FOREIGN KEY (`category`) REFERENCES categories(`category`),
    FOREIGN KEY (`model_number`) REFERENCES stocked_skus(`model_number`),
    UNIQUE KEY (`model_number`)
);

CREATE TABLE `heatsink` (
    ID int NOT NULL AUTO_INCREMENT,
    model_number varchar(255) NOT NULL,
    company varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    image_folder varchar(255) NOT NULL,
    description varchar(255) NOT NULL,
    category varchar(255) NOT NULL,
    color varchar(20),
    EAN varchar(255),
    PRIMARY KEY (ID),
    FOREIGN KEY (`company`) REFERENCES company(`manufacturer`),
    FOREIGN KEY (`category`) REFERENCES categories(`category`),
    FOREIGN KEY (`model_number`) REFERENCES stocked_skus(`model_number`),
    UNIQUE KEY (`model_number`)
);

CREATE TABLE `sound_card` (
    ID int NOT NULL AUTO_INCREMENT,
    model_number varchar(255) NOT NULL,
    company varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    image_folder varchar(255) NOT NULL,
    description varchar(255) NOT NULL,
    category varchar(255) NOT NULL,
    color varchar(20),
    EAN varchar(255),
    PRIMARY KEY (ID),
    FOREIGN KEY (`company`) REFERENCES company(`manufacturer`),
    FOREIGN KEY (`category`) REFERENCES categories(`category`),
    FOREIGN KEY (`model_number`) REFERENCES stocked_skus(`model_number`),
    UNIQUE KEY (`model_number`)
);
