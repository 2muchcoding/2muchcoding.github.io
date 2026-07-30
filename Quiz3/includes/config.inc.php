<?php

// Database configuration
// This file sets up database connection parameters based on the environment
// For production, update these values or use environment variables

// Localhost development settings
if ($_SERVER["HTTP_HOST"] == 'localhost' || $_SERVER["HTTP_HOST"] == 'localhost:8080') {
   $GLOBALS['HOSTNAME'] = 'localhost';
   $GLOBALS['DB_NAME']  = 'mySite';
   $GLOBALS['DB_HOST']  = 'localhost';
   $GLOBALS['DB_USERNAME'] = 'root';
   $GLOBALS['DB_PASSWORD'] = 'root';
} else {
   // Production/Azure server settings
   // NOTE: Update these credentials for your production environment
   // For security, consider using environment variables instead
   $GLOBALS['HOSTNAME'] = 'localhost';
   $GLOBALS['DB_NAME']  = 'mySite';
   $GLOBALS['DB_HOST']  = 'localhost';
   $GLOBALS['DB_USERNAME'] = 'phpmyadmin';
   $GLOBALS['DB_PASSWORD'] = '_bff2love@Urm0mshouse'; 
}


