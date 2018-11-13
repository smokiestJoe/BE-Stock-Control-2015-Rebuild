
-- FOR PRODUCTS

CREATE TABLE `XXXXX` (
    ID int NOT NULL AUTO_INCREMENT,
    company varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    image_folder varchar(255) NOT NULL,
    description varchar(255) NOT NULL,
    category varchar(255) NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (`company`) REFERENCES company(`manufacturer`),
    FOREIGN KEY (`category`) REFERENCES categories(`category`)
);