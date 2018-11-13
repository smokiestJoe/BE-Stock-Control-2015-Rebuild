CREATE TABLE `memory` (
    ID int NOT NULL AUTO_INCREMENT,
    company varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    image_folder varchar(255) NOT NULL,
    description varchar(255) NOT NULL,
    category varchar(255) NOT NULL,
    --
    mem_size varchar(10) NOT NULL,
    mem_denominator varchar(20) NOT NULL,
    mem_type varchar(20) NOT NULL,
    mem_connection varchar(20) NOT NULL,
    mem_speed varchar(20) NOT NULL,
    mem_oc_speead varchar(20) NOT NULL,
    mem_pin varchar(20) NOT NULL,
    --
    PRIMARY KEY (ID),
    FOREIGN KEY (`company`) REFERENCES company(`manufacturer`),
    FOREIGN KEY (`category`) REFERENCES categories(`category`)
);




