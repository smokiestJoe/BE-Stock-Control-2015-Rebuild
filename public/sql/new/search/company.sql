CREATE TABLE company (
  ID int NOT NULL AUTO_INCREMENT,
  manufacturer varchar(255) NOT NULL,
  PRIMARY KEY (ID),
  UNIQUE KEY (`manufacturer`)
);




INSERT INTO `company`(`manufacturer`) VALUES
('EVGA'),
('Lenovo'),
('Sony'),
('Plantronics'),
('Microsoft'),
('LG'),
('Symantec'),
('Medion'),
('Devolo'),
('Optoma'),
('Logitech'),
('MSI'),
('Brother'),
('Linksys'),
('TP Link'),
('Epson'),
('Bullguard'),
('McAfee'),
('Corsair'),
('Cherry'),
('Samsung'),
('Netgear'),
('Acer'),
('Asus'),
('AOC'),
('PNY'),
('Accuratus'),
('Linx'),
('Toshiba'),
('OCZ'),
('Western Digital'),
('Intel'),
('AMD'),
('Belkin');
