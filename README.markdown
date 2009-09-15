# eduroam-db  

*A possible implementation of Eduroam Monitoring Database*

Please consult the official webpage regarding specifications and other documentation.

## Dependencies 

* PHP5 
* SQLite3
* PHP5 SQLite PDO module
* mod_rewrite compatible web server

## Install

Download the latest tar|zip package from http://github.com/stas/eduroam-db 
Extract the contents in a directory accessible from a web browser. 

Got to app/config.php and edit the basic settings for web address and database location. 
According to the path you set in the config.php populate the database like this: 

` $ sqlite3 path/to/database.db < db/schema.sql `

After it got to the web location of the installation and register.

To enable the xml files, you will need to add some rewrite rules. Check the sample-htaccess.txt for examples.

## License

* GPL: http://creativecommons.org/licenses/GPL/2.0/

## Authors

* Stas SUSHKOV (stas@net.utcluj.ro) 

## Source Code

You can also clone the project with Git by running:

`$ git clone git://github.com/stas/eduroam-db`