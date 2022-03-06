<?php

// DB params
const DEM_DB_USER = '';
const DEM_DB_PASSWORD = '';
const DEM_DB_NAME = '';

// table params
const DEM_DB_TABLE = '';

// example columns
const DEM_TABLE_SQL = "CREATE TABLE `" . DEM_DB_TABLE . "` (
                            id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            first_name varchar(20) NOT NULL,
                            last_name varchar(20) NOT NULL
                       ) CHARACTER SET utf8 COLLATE utf8_general_ci";