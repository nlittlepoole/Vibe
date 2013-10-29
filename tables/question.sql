USE Vibosphere;

DROP TABLE IF EXISTS question;
CREATE TABLE question
(
  id              	  int unsigned NOT NULL auto_increment, # Unique ID for the transaction
  Question	  	  varchar(255),		# Any comment the user added
  Attribute	  	  varchar(255),		# Attribute that the questions is adressing, used for note taking purposes
  PRIMARY KEY     (id)
);