CREATE TABLE `graphics_card` (
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
    memory_size varchar(10) NOT NULL,
    memory_type varchar(10) NOT NULL,
    clock_speed varchar(10) NOT NULL,
    oc_clock_speed varchar(10),
    interface varchar(20),
    chipset varchar(20),
    low_profile boolean,
    out_hdmi int,
    out_dvi int,
    out_vga int,
    out_dp int,
    out_mini_dp int,
    audio boolean,
    cooling varchar(20),
    fans int,
    --
    PRIMARY KEY (ID),
    FOREIGN KEY (`company`) REFERENCES company(`manufacturer`),
    FOREIGN KEY (`category`) REFERENCES components(`component`),
    FOREIGN KEY (`model_number`) REFERENCES stocked_skus(`model_number`),
    UNIQUE KEY (`model_number`)
);

