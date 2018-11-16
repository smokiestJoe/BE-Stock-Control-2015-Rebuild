CREATE TABLE stocked_skus (
  ID int NOT NULL AUTO_INCREMENT,
  model_number varchar(255) NOT NULL,
  for_sale boolean,
  in_stock boolean,
  PRIMARY KEY (ID),
  UNIQUE KEY (`model_number`)
);

INSERT INTO `stocked_skus` (`model_number`) SELECT `model_number` FROM `stocked_products`;

UPDATE stocked_skus SET for_sale = 1 WHERE for_sale IS NULL;

UPDATE stocked_skus SET in_stock = 1 WHERE in_stock IS NULL;
