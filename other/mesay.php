<script>
  
    var x = "helloworld";
	alert(" <?php add('.<script> document.write(x); {{html "</src"+"ript>"}}.'); ?>");
	
</script>
<?php
 function add($x){
  $y =$x;
  echo $y;
 }
?>
