
<style>
#recaptcha_table{
	float:left;
}
</style>
	<!-- end header -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			
					<div class="shortcode row">
						<div class="col-md-6">
							<div class="box1" style="height: 548px;">
								<div class="striped">
								</div>
								<h6><i class=" fa fa-envelope "></i> Get in Touch </h6>
								<div style="height: 5px">
								</div>
								<div class="">
								<?php if(isset($msg)){?>
					<span style="color:red"><strong><?=$msg?></strong></span>
			<?php
			}
			?>
								</div>
								<form method="post" action="<?php echo base_url();?>Contact" id="contactform">
									<div class="form">
										<input class="col-md-12 in-width" type="text" name="name" id="name" placeholder="Name" value="<?php echo set_value('name'); ?>">
										<input class="col-md-12 in-width" type="text" name="email" id="email" placeholder="E-mail" value='<?php echo set_value("email"); ?>'>
										<span class="col-md-12"><?php echo "<span style='color:red'>".form_error('name')."</span>"; ?></span>
										<span class="col-md-12"><?php echo "<span style='color:red'>".form_error('email')."</span>"; ?></span>
										<textarea class="col-md-12 text-width" name="comment" id="comment" rows="7" placeholder="Message"><?php echo set_value("comment"); ?></textarea>
										 <?php echo "<span style='color:red'>".form_error('comment')."</span>"; ?>
										 <div class="recaptha_new_css">
                                          <?php echo $recaptcha_html; ?> </div>
										<input type="submit" id="submit" class="btn btn-primary" value="Submit">
									</div>
								</form>								<span class="boxlink wowhideme "><a href=" " class="defaultbutton mainthemebgcolor"><i class="fa fa-link"></i></a></span>-->
							</div>
						</div>
						<div class="col-md-6">
							<div class="box1">
								<div class="striped">
								</div>
								<h6><i class=" fa fa-map-marker "></i> Location </h6>
                                
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15226.772877123642!2d78.46339462957096!3d17.4265041406982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb96d50cb454b7%3A0xef2f487e7499ed13!2sPossibillion+Software+Technologies+Pvt+Ltd!5e0!3m2!1sen!2sin!4v1437222868314" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                                
<i class="fa fa-map-marker"></i> <i>Address</i>: 
virtual labs Software Technologies Pvt Ltd,<br/>
***************************,<br/>
*************************,<br/>
SECUNDERABAD – 500016.<br/>
Ph:040- 48488275<br/>
Fax: 040-48488286<br/>
								
<i class="fa fa-envelope"></i> <i>E-mail</i>: <a href="mailto:wowthemesnet@gmail.com">outreach@gmail.com</a><br/>
								
							</div>
						</div>
                        
                        
                        
					</div>			
			</div>
		</div>
	</div>
	<!-- end container -->
	<link href="<?php echo base_url()?>site/recaptcha.css" rel="stylesheet" />