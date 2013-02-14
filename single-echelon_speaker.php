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
			}

			$ptype = "echelon_speaker";
			$args = array(
				'post_type'=> $ptype,
				'order'    => 'ASC',
				'orderby'	=> 'meta_value',
				'meta_key' 	=> $ptype.'_order',
				'posts_per_page' => -1
			);              
			$the_query = new WP_Query( $args );
			$i=0;
			$spid = $p->ID;
			if($spid){
				$aspeakers = array();
				$thespeaker = array();
				if($the_query->have_posts() ){
					while ( $the_query->have_posts() ){
						$the_query->the_post();
						$p = get_post( get_the_ID(), OBJECT );
						$image_id = get_post_meta( $p->ID, $ptype.'_image_id', true );
						$designation = get_post_meta( $p->ID, $ptype.'_designation', true );
						$fb = get_post_meta( $p->ID, $ptype.'_fb', true );
						$tw = get_post_meta( $p->ID, $ptype.'_tw', true );
						$in = get_post_meta( $p->ID, $ptype.'_in', true );
						$image_src = wp_get_attachment_url( $image_id );
						
						$s = array();
						$s['p'] = $p;
						$s['designation'] = $designation;
						$s['fb'] = $fb;
						$s['tw'] = $tw;
						$s['in'] = $in;
						$s['image_src'] = $image_src;
						
						if($p->ID==$spid){
							$thespeaker = $s;
						}
						$aspeakers[] = $s;
					}
				}
				?>
				<script>
				jQuery(".highlights h2").hide();
				</script>
				<div class="row-fluid speaker-details">
					<div class="span4 add-top">
					  <ul>
						<?php
						foreach($aspeakers as $value){
							?><li <?php if($value['p']->ID==$spid){ echo "class='active'"; } ?> ><a href="<?php echo get_permalink( $value['p']->ID ) ; ?>"><?php echo $value['p']->post_title; ?></a></li><?php
						}
						?>
					  </ul>          
					</div>
					<div class="span8 wrapper-speakers add-top">
					  <div class="row-fluid pos-abs">              
						<div class="span3">
						  <img class="rounded" alt="speaker1" style='cursor:pointer; height:128px; width:128px' src="<?php echo $thespeaker['image_src']; ?>">
						</div>
						<div class="span9 crew-indiv">
							<em><?php echo $thespeaker['p']->post_title; ?></em><br><?php echo $thespeaker['designation']; ?>
							<div class="social add-top-xxs">
							  <?php
							  if($thespeaker['tw']){
								?><a class="twitter" href="<?php echo $thespeaker['tw']; ?>">twitter</a><?php
							  }
							  if($thespeaker['fb']){
								?><a class="facebook" href="<?php echo $thespeaker['fb']; ?>">facebook</a><?php
							  }
							  if($thespeaker['in']){
								?><a class="linkedin" href="<?php echo $thespeaker['in']; ?>">linkedin</a><?php
							  }
							  
							  ?>
							</div>  
						</div>
					  </div>
					  <div class="row-fluid add-top">
						<?php echo nl2br($thespeaker['p']->post_content); ?>
					  </div>
					</div>
				</div>
				<?php
			}
			wp_reset_postdata();
		  
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