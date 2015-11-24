<!--<div class="container backgroundimage" style="color:black;font-weight:bold;">-->

<div class="wrapper row3">
  <div id="container">
    <!-- ################################################################################################ -->
    <div id="homepage" class="clear">

<?php
//var_dump($name);


echo "<h2 class='nospace'><strong>Forum Post & Comments</strong></h2>";
echo "<div class='divide'></div>";
echo "<div class=screen-pad>";
echo "<div class=screen-pad>";
 echo "<div class='tab-wrapper clear'>";
     echo " <div class='tab-container'>";
        echo " <div id='tab-1' class='tab-content clear'>";
echo "<div><h2>Category :<span style='color:#FF9900'>".$category."</span></h2></div>";
echo "<div class='divide'></div>";
echo "<div style=font-size:18px;font-weight:bold>" .$name['aname']." :</div>";
echo "<br/>";

echo "<div style=font-size:20px>".$forum_item['fpost']."</div>";
echo "</div>";


echo "<div style=float:right;font-size:14px;font-weight:bold> <span style='color:#FF9900'> TIME :</span>".$forum_item['time']."<span style='color:#FF9900'> DATE :</span>".$forum_item['date']."</div>";
echo "<br/>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
?>
</div>
</div>

</div>

</div>
