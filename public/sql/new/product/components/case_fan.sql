CREATE TABLE `case_fan` (
    ID int NOT NULL AUTO_INCREMENT,
    model_number varchar(255) NOT NULL,
    company varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    image_folder varchar(255) NOT NULL,
    description varchar(255) NOT NULL,
    category varchar(255) NOT NULL,
    color varchar(20),
    EAN varchar(255),
    --
    fan_size varchar(10) NOT NULL,
    high_pressure boolean,
    low_noise boolean,
    LED boolean,
    speed varchar(10) NOT NULL,
    pack_size varchar(10) NOT NULL,
    --
    PRIMARY KEY (ID),
    FOREIGN KEY (`company`) REFERENCES company(`manufacturer`),
    FOREIGN KEY (`category`) REFERENCES components(`component`),
    FOREIGN KEY (`model_number`) REFERENCES stocked_skus(`model_number`),
    UNIQUE KEY (`model_number`)
);
