
-- FOR PRODUCTS

CREATE TABLE `XXXXX` (
    ID int NOT NULL AUTO_INCREMENT,
    model_number varchar(255) NOT NULL,
    company varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    image_folder varchar(255) NOT NULL,
    description varchar(255) NOT NULL,
    category_type varchar(255) NOT NULL,
    color varchar(20),

    PRIMARY KEY (ID),
    FOREIGN KEY (`company`) REFERENCES company(`manufacturer`),
    FOREIGN KEY (`category_type`) REFERENCES components(`category_type`),
    FOREIGN KEY (`model_number`) REFERENCES stocked_skus(`model_number`),
    UNIQUE KEY (`model_number`)
);
