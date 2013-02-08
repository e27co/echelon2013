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
        
        <div class="span3 side-pillar txt-c" id='side_pillar' style='display:none'>
			<?php
			$side = false;
			$ptype = "e_sponsor";
			$args = array(
				'post_type'=> $ptype,
				'order'    => 'ASC',
				'orderby'	=> 'meta_value',
				'meta_key' 	=> $ptype.'_order',
				'posts_per_page' => -1
			);              
			$the_query = new WP_Query( $args );
			$premier_sponsors = array();
			$sponsors = array();
			if($the_query->have_posts() ){
				while ( $the_query->have_posts() ){
					$the_query->the_post();
					$p = get_post( get_the_ID(), OBJECT );
					$image_id = get_post_meta( $p->ID, $ptype.'_image_id', true );
					$type = get_post_meta( $p->ID, $ptype.'_type', true );
					$link = get_post_meta( $p->ID, $ptype.'_link', true );
					$html = get_post_meta( $p->ID, $ptype.'_html', true );
					
					$image_src = wp_get_attachment_url( $image_id );
					$v = array();
					$v['post'] = $p;
					$v['image_src'] = $image_src;
					$v['link'] = $link;
					$v['html'] = $html;
					
					if(strtolower($type)=='premier'){
						$premier_sponsors[] = $v;
						$side = true;
					}
					else{
						$sponsors[] = $v;
						$side = true;
					}
				}
			}
			
			wp_reset_postdata();
			
			$t = count($premier_sponsors);
			if($t){
				?>
				<div class="head-pillar"><p>Premier Sponsors</p></div>
				<ul>
				<?php
				for($i=0; $i<$t; $i++){
					?>
					<li>
					<?php
					if(trim($premier_sponsors[$i]['html'])){
						echo trim($premier_sponsors[$i]['html']);
					}
					else{
						e_view($premier_sponsors[$i]['post']);
						if(trim($premier_sponsors[$i]['link'])){
							?>
							<a href="<?php echo e_clickurl($premier_sponsors[$i]['link'], $premier_sponsors[$i]['post']); ?>"><img src="<?php echo $premier_sponsors[$i]['image_src']; ?>" title="<?php echo htmlentities($premier_sponsors[$i]['post']->post_title); ?>" alt="<?php echo htmlentities($premier_sponsors[$i]['post']->post_title); ?>"></a>
							<?php
						}
						else{
							?>
							<img src="<?php echo $premier_sponsors[$i]['image_src']; ?>" title="<?php echo htmlentities($premier_sponsors[$i]['post']->post_title); ?>" alt="<?php echo htmlentities($premier_sponsors[$i]['post']->post_title); ?>">
							<?php
						}
					}
					?>
					</li>
					<?php
				}
				?>
				</ul>
				<?php
			}
			
			$t = count($sponsors);
			if($t){
				?>
				<div class="inner-pillar"><p>Sponsors</p></div>
				<ul>
				<?php
				for($i=0; $i<$t; $i++){
					?>
					<li>
					<?php
					if(trim($sponsors[$i]['html'])){
						echo trim($sponsors[$i]['html']);
					}
					else{
						e_view($sponsors[$i]['post']);
						if(trim($sponsors[$i]['link'])){
							?>
							<a href="<?php echo e_clickurl($sponsors[$i]['link'], $sponsors[$i]['post']); ?>"><img src="<?php echo $sponsors[$i]['image_src']; ?>" title="<?php echo htmlentities($sponsors[$i]['post']->post_title); ?>" alt="<?php echo htmlentities($sponsors[$i]['post']->post_title); ?>"></a>
							<?php
						}
						else{
							?>
							<img src="<?php echo $sponsors[$i]['image_src']; ?>" title="<?php echo htmlentities($sponsors[$i]['post']->post_title); ?>" alt="<?php echo htmlentities($sponsors[$i]['post']->post_title); ?>">
							<?php
						}
					}
					?>
					</li>
					<?php
				}
				?>
				</ul>
				<?php
			}
			
			
			
			
			
			$ptype = "e_mediapartners";
			$args = array(
				'post_type'=> $ptype,
				'order'    => 'ASC',
				'orderby'	=> 'meta_value',
				'meta_key' 	=> $ptype.'_order',
				'posts_per_page' => -1
			);              
			$the_query = new WP_Query( $args );
			$premier_mps = array();
			$mps = array();
			if($the_query->have_posts() ){
				while ( $the_query->have_posts() ){
					$the_query->the_post();
					$p = get_post( get_the_ID(), OBJECT );
					$image_id = get_post_meta( $p->ID, $ptype.'_image_id', true );
					$type = get_post_meta( $p->ID, $ptype.'_type', true );
					$link = get_post_meta( $p->ID, $ptype.'_link', true );
					$html = get_post_meta( $p->ID, $ptype.'_html', true );
					
					$image_src = wp_get_attachment_url( $image_id );
					$v = array();
					$v['post'] = $p;
					$v['image_src'] = $image_src;
					$v['link'] = $link;
					$v['html'] = $html;
					
					if(strtolower($type)=='premier'){
						$premier_mps[] = $v;
						$side = true;
					}
					else{
						$mps[] = $v;
						$side = true;
					}
				}
			}
			
			wp_reset_postdata();
			
			$t = count($premier_mps);
			if($t){
				?>
				<div class="inner-pillar"><p>Premier Media Partners</p></div>
				<ul>
				<?php
				for($i=0; $i<$t; $i++){
					?>
					<li>
					<?php
					e_view($premier_mps[$i]['post']);
					if(trim($premier_mps[$i]['link'])){
						?>
						<a href="<?php echo e_clickurl($premier_mps[$i]['link'], $premier_mps[$i]['post']); ?>"><img src="<?php echo $premier_mps[$i]['image_src']; ?>" title="<?php echo htmlentities($premier_mps[$i]['post']->post_title); ?>" alt="<?php echo htmlentities($premier_mps[$i]['post']->post_title); ?>"></a>
						<?php
					}
					else{
						if(trim($premier_mps[$i]['link'])){
							?>
							<a href="<?php echo $premier_mps[$i]['link']; ?>"><img src="<?php echo $premier_mps[$i]['image_src']; ?>" title="<?php echo htmlentities($premier_mps[$i]['post']->post_title); ?>" alt="<?php echo htmlentities($premier_mps[$i]['post']->post_title); ?>"></a>
							<?php
						}
						else{
							?>
							<img src="<?php echo $premier_mps[$i]['image_src']; ?>" title="<?php echo htmlentities($premier_mps[$i]['post']->post_title); ?>" alt="<?php echo htmlentities($premier_mps[$i]['post']->post_title); ?>">
							<?php
						}
					}
					?>
					</li>
					<?php
				}
				?>
				</ul>
				<?php
			}
			
			$t = count($mps);
			if($t){
				?>
				<div class="inner-pillar"><p>Media Partners</p></div>
				<ul>
				<?php
				for($i=0; $i<$t; $i++){
					?>
					<li>
					<?php
					e_view($mps[$i]['post']);
					if(trim($mps[$i]['link'])){
						?>
						<a href="<?php echo e_clickurl($mps[$i]['link'], $mps[$i]['post']); ?>"><img src="<?php echo $mps[$i]['image_src']; ?>" title="<?php echo htmlentities($mps[$i]['post']->post_title); ?>" alt="<?php echo htmlentities($mps[$i]['post']->post_title); ?>"></a>
						<?php
					}
					else{
						if(trim($mps[$i]['link'])){
							?>
							<a href="<?php echo $mps[$i]['link']; ?>"><img src="<?php echo $mps[$i]['image_src']; ?>" title="<?php echo htmlentities($mps[$i]['post']->post_title); ?>" alt="<?php echo htmlentities($mps[$i]['post']->post_title); ?>"></a>
							<?php
						}
						else{
							?>
							<img src="<?php echo $mps[$i]['image_src']; ?>" title="<?php echo htmlentities($mps[$i]['post']->post_title); ?>" alt="<?php echo htmlentities($mps[$i]['post']->post_title); ?>">
							<?php
						}
					}
					?>
					</li>
					<?php
				}
				?>
				</ul>
				<?php
			}
			?>
			

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