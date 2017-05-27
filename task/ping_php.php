<?php
include ("../system/config.php"); 
 
$sql_main = mysql_query("SELECT ip FROM INT_radio_planning ");
   while($row = mysql_fetch_array($sql_main))
    {
	  $ip=$row['ip'];  

          

    $comando = "ping $ip -c 2";
    $output = shell_exec($comando);
     list($reciduo, $output2) = explode(",", $output);


if($output2==' 1 received' || $output2==' 2 received')
{
	 $sql_update=mysql_query("UPDATE INT_radio_planning SET up='1'  WHERE  ip='$ip' ");

}
else {

	 $sql_update=mysql_query("UPDATE INT_radio_planning SET up='0'  WHERE  ip='$ip' ");



}





}

?>
