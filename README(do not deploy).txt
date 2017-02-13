README

The database initialization file is called “dbconnect2.php” and located in the “php” folder. Read the comments to initialize correctly.

This login system sends emails automatically with PHPMailer ( https://github.com/PHPMailer/PHPMailer ). However, the email account to be used has to be initialized as well. You can do this in the “PHPMailerinit.php” file located in the “php” folder.

This login system has been tested with PHPmyAdmin and is not secure. It uses vulnerable hashing methods. Moreover, the resetrequest is valid for an indefinite period of time.