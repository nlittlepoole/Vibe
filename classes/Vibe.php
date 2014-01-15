<?php
 
/**
 * Class to handle articles
 */
 
class Vibe
{
 
  // Properties
 
  /**
  * @var The asked user's facebook ID #
  */
  public $user_id_1 = null;
 
  /**
  * @var The recepient's facebook user ID #
  */
  public $user_id_2 = null;
 
  /**
  * @var The number of the attribute being asked
  */
  public $attribute = null;
 
  /**
  * @var The numerical answer to the attribute
  */
  public $answer = null;
 
  /**
  * @var The comment left with the attribute
  */
 
 public $comment = null;
  /**
  * Sets a Vibe's Parameters
  *
  * @param assoc The property values
  */
   public $affiliations = null;
  /**
  * Sets a Vibe's Parameters
  *
  * @param assoc The property values
  */
    public $keywords = null;
  /**
  * Sets a Vibe's Parameters
  *
  * @param assoc The property values
  */
  public $gender=null;
  public $name=null;
  public function __construct( $input_user1, $input_user2, $input_attribute, $input_keywords,$input_affiliations,$input_gender,$input_name) {
    $this->user_id_1 =  $input_user1;
    $this->user_id_2 =  $input_user2;
    $this->attribute = $input_attribute;
    $this->affiliations =$input_affiliations;
    $this->keywords=$input_keywords;
    $this->gender=$input_gender;
    $this->name=$input_name;
  }
 
  /**
  * Sets the object's properties using the edit form post values in the supplied array
  *
  * @param assoc The form post values
  */
 
  public function setAnswer( $input_answer, $input_comment) {
    $this->answer=$input_answer;
    $this->comment=$input_comment;
  }
 
  public function recordToTable(){
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    echo $sql = "INSERT INTO transaction (asked,recipient,attribute,answer,comment,keywords,Affiliations,Gender,Name) VALUES('$this->user_id_1', '$this->user_id_2','$this->attribute' ,$this->answer,'$this->comment', '$this->keywords','$this->affiliations','$this->gender','$this->name')";
    $st = $conn->prepare( $sql );
    $st->execute();
    $conn = null;
  }

    /**
  * Adds user to Database using facebook ID as SQL ID
  *
  * @param int of the Fcebook ID
  */
}
 
?>