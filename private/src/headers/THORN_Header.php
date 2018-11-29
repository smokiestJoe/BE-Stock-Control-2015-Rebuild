<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 18/11/2018
 * Time: 11:14
 */

/* ABSTRACT CLASSES */
//require_once __DIR__ . "/../../THORN/AbstractClasses/";
require_once __DIR__ . "/../../THORN/AbstractClasses/AbstractRepository.php";
require_once __DIR__ . "/../../THORN/AbstractClasses/AbstractObject.php";
require_once __DIR__ . "/../../THORN/AbstractClasses/AbstractProductMapper.php";
require_once __DIR__ . "/../../THORN/AbstractClasses/AbstractStatements.php";

/* PARENT CLASSES */
//require_once __DIR__ . "/../../THORN/ParentClasses/";

//require_once __DIR__ . "/../../THORN/ParentClasses/Factory
require_once __DIR__ . "/../../THORN/ParentClasses/Factory/RepositoryFactory.php";

//require_once __DIR__ . "/../../THORN/ParentClasses/Repository
require_once __DIR__ . "/../../THORN/ParentClasses/Repository/Repository.php";

//require_once __DIR__ . "/../../THORN/ParentClasses/Model
require_once __DIR__ . "/../../THORN/ParentClasses/Model/ObjectCustomer.php";
require_once __DIR__ . "/../../THORN/ParentClasses/Model/ObjectOrder.php";
require_once __DIR__ . "/../../THORN/ParentClasses/Model/ObjectProduct.php";

//require_once __DIR__ . "/../../THORN/ParentClasses/Mapper
require_once __DIR__ . "/../../THORN/ParentClasses/Mapper/ProductMapperObjectProduct.php";
require_once __DIR__ . "/../../THORN/ParentClasses/Mapper/ProductMapperObjectOrder.php";
require_once __DIR__ . "/../../THORN/ParentClasses/Mapper/ProductMapperObjectCustomer.php";

//require_once __DIR__ . "/../../THORN/ParentClasses/SqlStatements
require_once __DIR__ . "/../../THORN/ParentClasses/SqlStatements/ObjectProductStatements.php";
require_once __DIR__ . "/../../THORN/ParentClasses/SqlStatements/ObjectOrderStatements.php";
require_once __DIR__ . "/../../THORN/ParentClasses/SqlStatements/ObjectCustomerStatements.php";


/* CHILD CLASSES */
//require_once __DIR__ . "/../../THORN/ChildClasses/";
require_once __DIR__ . "/../../THORN/ChildClasses/ObjectProduct_Memory.php";
require_once __DIR__ . "/../../THORN/ChildClasses/ObjectProduct_Graphics_card.php";
require_once __DIR__ . "/../../THORN/ChildClasses/ObjectProduct_case_fan.php";