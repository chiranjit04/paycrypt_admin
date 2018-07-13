<?php
for($i=1;$i<=100;$i++)
{
	for($j = 1; $j<=$i; $j++)
	{
	 $temp = $i % $j;
	 if($temp == 1)
	 {
	 echo "is a prime number &nbsp; ".$j."<br>";
	 }
}
}
?>