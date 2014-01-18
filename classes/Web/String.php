<?php
function keywords($keywords,$total,$split){
  $new_keyword='';
  $min=(2*$total/$split);
  $keywords=split('&&',$keywords);
  for ($x=0; $x<=count($keywords); $x++){
      $min=$min+stristr($keywords[$x], '(',true);
  }
  for ($x=0; $x<=count($keywords); $x++){
      $count=$min+stristr($keywords[$x], '(',true);
      if($count>$min){
        $temp="#".str_replace(array(1,2,3,4,5,6,7,8,9,0,')','(',' '),'', stristr($keywords[$x] ,'(') );
        $new_keyword=$new_keyword=''? $temp: $new_keyword. " " . $temp;
      }
  }
  return $new_keyword!=''?$new_keyword:"N/A";
}
function dashboardComments($comments,$uid){
  $comments=split('&&',$comments);
  $max=sizeof($comments);
  if($comments[0]!=''){
    for ($x=0; $x<$max; $x++){
      $temp=split('##',$comments[$x]);
      print_r($temp);
      $datetime2 = new DateTime(date("Y-m-d H:i:s", time()));
      $datetime1 = new DateTime($temp[1]);
      $interval = $datetime1->diff($datetime2);
      $time=$interval->format('%a days');
      if($time==='0 days'){
        $time=$interval->format('%h hrs');
        if($time==='0 hrs'){
          $time=$interval->format('%i mins');
        }       
      }
    
    //splice the comment further to get a stylized comment
    $commentPair = split(':',$temp[2]); 
    $commentPair[1]=str_replace("***","'",$commentPair[1]);
    $commentPair[1]=str_replace("{(!)}",":",$commentPair[1]);
      $comments[$x]='                 
              <li>
                    <div class="col1">
                      <div class="cont">
                        <div class="cont-col1">
                          <div class="desc"><span style="color: #0d638f;" class="tooltips" data-container="body" data-original-title="' . $commentPair[0] . '">
                             '. $commentPair[1].'&nbsp;&nbsp;
                              <span class="label label-sm" style="background-color: ' . $_SESSION['coloredVibes'][$temp[0]] . ';">'.$temp[0].'&nbsp;</span>
                          </span>
                          </div>
                        <a style="color: tomato" href="/index.php?action=removeComment&comment='.$x.'"><em>Remove&nbsp;&nbsp;&nbsp;&nbsp;</em></a>
                        <a style="color: darkred" href="/index.php?action=spam&id='.$uid.'&id2='.$temp[3].'"><em>Mark Spam</em></a>
                        </div>
                      </div>
                    </div>
                    <div class="col2">
                      <div class="date">
                         '.$time.'
                         
                      </div>
                    </div>
                  </li>';
      //$comments[$x]=Array($temp[2],$temp[0], $time);
    }
  }
  else{
    $comments=array();
    $comments[0]='                 
              <li>
                    <div class="col1">
                      <div class="cont">
                        <div class="cont-col1">
                          <div class="desc"><span style="color: #0d638f;" class="tooltips" data-container="body" >
                             No Comments Left Yet &nbsp;&nbsp;
                          </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col2">
                      <div class="date">                         
                      </div>
                    </div>
                  </li>';
  }
  return $comments;  
}
function comments($comments){
  $comments=split('&&',$comments);
  $max=sizeof($comments);
  if($comments[0]!=''){
    for ($x=0; $x<$max; $x++){
      $temp=split('##',$comments[$x]);
      print_r($temp);
      $datetime2 = new DateTime(date("Y-m-d H:i:s", time()));
      $datetime1 = new DateTime($temp[1]);
      $interval = $datetime1->diff($datetime2);
      $time=$interval->format('%a days');
      if($time==='0 days'){
        $time=$interval->format('%h hrs');
        if($time==='0 hrs'){
          $time=$interval->format('%i mins');
        }       
      }
	  
	  //splice the comment further to get a stylized comment
	  $commentPair = split(':',$temp[2]); 
	  $commentPair[1]=str_replace("***","'",$commentPair[1]);
    $commentPair[1]=str_replace("{(!)}",":",$commentPair[1]);
      $comments[$x]='                 
      			  <li>
                    <div class="col1">
                      <div class="cont">
                        <div class="cont-col1">
                          <div class="desc"><span style="color: #0d638f;" class="tooltips" data-container="body" data-original-title="' . $commentPair[0] . '">
                             '. $commentPair[1].'&nbsp;&nbsp;
                              <span class="label label-sm" style="background-color: ' . $_SESSION['coloredVibes'][$temp[0]] . ';">'.$temp[0].'&nbsp;</span>
                          </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col2">
                      <div class="date">
                         '.$time.'
                         
                      </div>
                    </div>
                  </li>';
      //$comments[$x]=Array($temp[2],$temp[0], $time);
    }
  }
    for ($x=$max; $x<9; $x++){
      $comments[$x]='                 <li>
                    <div class="col1">
                      <div class="cont">
                        <div class="cont-col1">
                          <div class="desc">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col2">
                      <div class="date">
                      </div>
                    </div>
                    
                  </li>';
    }
  return $comments;  
}
?>