USE Vibosphere;

DROP TABLE IF EXISTS user;
CREATE TABLE user
(
  id              	  int unsigned NOT NULL, # Unique ID for the transaction
  Active	  	      boolean not null default 0, # returns if user has signed up yet
  Communities	  	  varchar(255),		# List of communities user is in, terms seperated using symbols, dealt with using python script
  Gender	  	      varchar(255),		# users gender
  Age	  	          varchar(255),		# user's age
  Race	  	          varchar(255),		# user's race
  Question1	  	      varchar(255),		# Average score, followed with comments all seperated with symbols
  Question2  	 	  varchar(255),		# Any comment the user added
  Question3  	 	  varchar(255),		# Any comment the user added
  Question4  	 	  varchar(255),		# Any comment the user added
  Question5  	 	  varchar(255),		# Any comment the user added
  Question6  	 	  varchar(255),		# Any comment the user added
  Question7  	 	  varchar(255),		# Any comment the user added
  Question8  	 	  varchar(255),		# Any comment the user added
  Question9  	 	  varchar(255),		# Any comment the user added
  Question10  	 	  varchar(255),		# Any comment the user added
  Question11 	 	  varchar(255),		# Any comment the user added
  Question12 	 	  varchar(255),		# Any comment the user added
  Question13  	 	  varchar(255),		# Any comment the user added
  Question14  	 	  varchar(255),		# Any comment the user added
  Question15  	 	  varchar(255),		# Any comment the user added
  Question16  	 	  varchar(255),		# Any comment the user added
  Question17  	 	  varchar(255),		# Any comment the user added
  Question18  	 	  varchar(255),		# Any comment the user added
  Question19  	 	  varchar(255),		# Any comment the user added
  Question20  	 	  varchar(255),		# Any comment the user added
  
  PRIMARY KEY     (id)
);