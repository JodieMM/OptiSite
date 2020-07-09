/* Create a user for the site, local and hosted */
CREATE USER 'system'@'localhost'
  IDENTIFIED BY 'hfktcaYh6SWENae8EJku';
  
CREATE USER 'system'@'%.opti.technology'
  IDENTIFIED BY 'hfktcaYh6SWENae8EJku';
  
/* Give Users Permissions */
  
GRANT SELECT,INSERT,UPDATE,DELETE
  ON ebdb.accounts
  TO 'system'@'localhost';

GRANT SELECT,INSERT,DELETE
  ON ebdb.logged_in
  TO 'system'@'localhost';

GRANT SELECT,INSERT,DELETE
  ON ebdb.verification_codes
  TO 'system'@'localhost';
  

GRANT SELECT,INSERT,UPDATE,DELETE
  ON ebdb.accounts
  TO 'system'@'%.opti.technology';

GRANT SELECT,INSERT,DELETE
  ON ebdb.logged_in
  TO 'system'@'%.opti.technology';

GRANT SELECT,INSERT,DELETE
  ON ebdb.verification_codes
  TO 'system'@'%.opti.technology';