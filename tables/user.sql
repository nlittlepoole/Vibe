USE Vibosphere;

DROP TABLE IF EXISTS user;
CREATE TABLE user
(
  id              	  int unsigned NOT NULL, # user's in order of join time
  UID               varchar(255),   # user's ID
  Active	  	      boolean not null default 0, # returns if user has signed up yet
  Communities	  	  varchar(255),		# List of communities user is in, terms seperated using symbols, dealt with using python script
  Gender	  	      varchar(255),		# users gender
  Age	  	          varchar(255),		# user's age
  Race	  	         varchar(255),		# user's race
  Question1	  	    varchar(255),		# Average score, followed with comments all seperated with symbols
  Total1            int unsigned,   # Total number of answers for this attribute 
  Question2         varchar(255),   # Average score, followed with comments all seperated with symbols
  Total2            int unsigned,   # Total number of answers for this attribute 
  Question3         varchar(255),   # Average score, followed with comments all seperated with symbols
  Total3            int unsigned,   # Total number of answers for this attribute 
  Question4         varchar(255),   # Average score, followed with comments all seperated with symbols
  Total4            int unsigned,   # Total number of answers for this attribute 
  Question5         varchar(255),   # Average score, followed with comments all seperated with symbols
  Total5            int unsigned,   # Total number of answers for this attribute 
  Question6         varchar(255),   # Average score, followed with comments all seperated with symbols
  Total6            int unsigned,   # Total number of answers for this attribute 
  Question7         varchar(255),   # Average score, followed with comments all seperated with symbols
  Total7            int unsigned,   # Total number of answers for this attribute 
  Question8         varchar(255),   # Average score, followed with comments all seperated with symbols
  Total8            int unsigned,   # Total number of answers for this attribute 
  Question9         varchar(255),   # Average score, followed with comments all seperated with symbols
  Total9            int unsigned,   # Total number of answers for this attribute 
  Question10        varchar(255),   # Average score, followed with comments all seperated with symbols
  Total10           int unsigned,   # Total number of answers for this attribute 
  Question11 	 	    varchar(255),		# Any comment the user added
  Total11           int unsigned,   # Total number of answers for this attribute 
  Question12 	 	    varchar(255),		# Any comment the user added
  Total12           int unsigned,   # Total number of answers for this attribute 
  Question13  	 	  varchar(255),		# Any comment the user added
  Total13           int unsigned,   # Total number of answers for this attribute
  Question14  	 	  varchar(255),		# Any comment the user added
  Total14           int unsigned,   # Total number of answers for this attribute
  Question15  	 	  varchar(255),		# Any comment the user added
  Total15           int unsigned,   # Total number of answers for this attribute
  Question16  	 	  varchar(255),		# Any comment the user added
  Total16           int unsigned,   # Total number of answers for this attribute
  Question17  	 	  varchar(255),		# Any comment the user added
  Total17           int unsigned,   # Total number of answers for this attribute
  Question18  	 	  varchar(255),		# Any comment the user added
  Total18           int unsigned,   # Total number of answers for this attribute
  Question19  	 	  varchar(255),		# Any comment the user added
  Total19           int unsigned,   # Total number of answers for this attribute
  Question20  	 	  varchar(255),		# Any comment the user added
  Total20           int unsigned,   # Total number of answers for this attribute
  
  PRIMARY KEY     (id)
);