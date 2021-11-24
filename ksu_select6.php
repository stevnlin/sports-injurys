<?php
 $dept=str_replace("'","''",$_REQUEST['dept']); 
  
 $db_host = "localhost";
 $db_name = "sports_injurys";
 $db_table = "sports_injurys";
 $db_user = "root";
 $db_password = "";
 
 // 連結檢測
 $conn = mysqli_connect($db_host, $db_user, $db_password, );
 if(empty($conn)){
	print  mysqli_error ($conn);
    die ("無法對資料庫連線！" );
	exit;
 }  
 if(!mysqli_select_db( $conn, $db_name)){
	die("資料庫不存在!");
	exit;
 }  

 //自型設定  
 mysqli_set_charset($conn,'utf8');
      
 echo "您查詢的結果顯示如下:". "<br/><br/>";  
 $result = mysqli_query
           ($conn,
            "SELECT sportsinjury_name, sportsinjury_symptoms, sportsinjury_parts, sportsinjury_rehab, sportsinjurys_precautions
 
			 FROM  sports_injurys
			 where sportsinjury_name  LIKE '%$dept%'
			  "); 	//照順序  group by 群組化
			 
 echo "<table border='1'>
 <tr>
    <th>運動傷害名稱 </th> <th>症狀 </th> <th>部位 </th> <th>受傷後處理與後續復健方式 </th> <th>注意事項 </th> 
 </tr>";

 //使用 mysqli_fetch_array() 取回資料庫資料
 $row_num=0;
 while($row = mysqli_fetch_array($result))
 {
   echo "<tr>"; //row
   echo "<td>" . $row['sportsinjury_name']  .   "</td>"; //data
   echo "<td>" . $row['sportsinjury_symptoms'] .   "</td>";
   echo "<td>" . $row['sportsinjury_parts'] .   "</td>";
   echo "<td>" . $row['sportsinjury_rehab'] .   "</td>";
   echo "<td>" . $row['sportsinjurys_precautions'] .   "</td>";
  
   echo "</tr>";
   $row_num = $row_num+1;
 }
 echo "</table>";
 echo $row_num . "  個搜尋結果!"."<br/><br/>";
?> 
<form enctype="multipart/form-data"  method="post" action="ksu_select6.html">
<input type="submit" name="sub" value="返回"/>
</form>