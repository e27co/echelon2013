<?php
get_header();
?>


    <div class="container add-top">
      <div class="row add-bot-med">
        <div class="span9 highlights">
          
		  <?php
		  while ( have_posts() ){
			the_post();
			$p = get_post( get_the_ID(), OBJECT );
			?><h2><?php echo $p->post_title;?></h2><?php
			echo "<div class='content'>";
			the_content();
			echo "</div>";
		  }
		  
		  ?>
		</div>
		<div class="span3">
			<div class="side-pillar txt-c" id='side_pillar' style='display:none'>
				<?php
				include_once(dirname(__FILE__)."/sidepillar.php");
				?>
			</div>
		</div>
	 

      
    <!-- /container -->
   
</div>

 <!-- /container -->
 <?php
  if($side){
	?>
	<script>
		jQuery("#side_pillar").show();
	</script>
	<?php		
  }
  
  ?>
<?php
get_footer();
?>