/* Create a user for the site, local and hosted */
CREATE USER 'system'@'localhost'
  IDENTIFIED BY 'hfktcaYh6SWENae8EJku';
  
CREATE USER 'system'@'%.opti.technology'
  IDENTIFIED BY 'hfktcaYh6SWENae8EJku';
  
/* Give Users Permissions */
  
GRANT SELECT,INSERT,UPDATE,DELETE
  ON opti_db.accounts
  TO 'system'@'localhost';

GRANT SELECT,INSERT,DELETE
  ON opti_db.logged_in
  TO 'system'@'localhost';

GRANT SELECT,INSERT,DELETE
  ON opti_db.verification_codes
  TO 'system'@'localhost';
  

GRANT SELECT,INSERT,UPDATE,DELETE
  ON opti_db.accounts
  TO 'system'@'%.opti.technology';

GRANT SELECT,INSERT,DELETE
  ON opti_db.logged_in
  TO 'system'@'%.opti.technology';

GRANT SELECT,INSERT,DELETE
  ON opti_db.verification_codes
  TO 'system'@'%.opti.technology';