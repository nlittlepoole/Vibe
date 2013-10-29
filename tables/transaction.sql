USE Vibosphere;

DROP TABLE IF EXISTS transaction;
CREATE TABLE transaction
(
  id              int unsigned NOT NULL auto_increment, # Unique ID for the transaction
  asked		  int unsigned,                # Who was asked
  recipient       int unsigned,                # Who the question was about
  question        int unsigned,                # ID of the question asked
  answer          int unsigned,                # The numerican answer to the question
  comment	  varchar(255),		# Any comment the user added
  

  PRIMARY KEY     (id)
);