<div class="cms-clear"></div>
<div id="cms-content-footer">
	<a href="http://labs.library.gvsu.edu/status/?problem" class="cms-report-problem">report a problem with this page</a>
</div>
</div><!-- end content -->
</div>
</div>
</div>
<div id="cms-footer-wrapper">
		<div id="cms-footer">
			<div id="cms-footer-inner">
				<ul>

						<li>

								<h4>Address</h4>

									<p class="vcard">
										<span class="adr">

													<span class="fn">Special Collections and</span>
													<br>

													<span class="fn">University Archives</span>
													<br>

													<span class="street-address">Seidman House</span>
													<br>

													<span class="street-address">1 Campus Drive</span>
													<br>

													<span class="locality">Allendale</span>,

													<span class="region">Michigan</span>

													<span class="postal-code ">49401</span>
													<br>

										</span>
									</p>

						</li>

						<li>

								<h4>Contact</h4>

									<p class="vcard">

												<span class="tel">
													<span class="type">Phone</span>:
													<span class="value">
														<a href="tel:616-331-2749">(616) 331-2749</a>
													</span>
												</span>
												<br>

												<a href="mailto:collections@gvsu.edu" class="email">collections@gvsu.edu</a>
												<br>

									</p>

						</li>

				</ul>
			</div>
		</div>
	</div>
  <div id="cms-copyright-wrapper">
	<div id="cms-copyright">
		<div id="cms-copyright-inner">

			<ul>
				<li>
					<a href="//www.gvsu.edu/affirmativeactionstatement.htm">GVSU is an EO/AA Institution</a>
				</li>
				<li>
					<a href="//www.gvsu.edu/privacystatement.htm">Privacy Policy</a>
				</li>
				<li>
					<a href="//www.gvsu.edu/disclosures">Disclosures</a>
				</li>
				<li>
					Copyright © 1995-2016 GVSU
				</li>
			</ul>
		</div>
	</div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function(){
        Omeka.showAdvancedForm();
        Omeka.skipNav();
        Omeka.megaMenu();
        Berlin.dropDown();

        if(jQuery('#item-images').find('div.item-file').length > 1) {
            // Add special meia class to make video and audio larger
            jQuery('#item-images').find('video').parent('div.item-file').addClass('gvsu_media');
            jQuery('#item-images').find('audio').parent('div.item-file').addClass('gvsu_media');
            jQuery('#item-images').find('.image-jpeg:first').css('clear','left');
        } else {
            jQuery('#item-images').find('div.item-file').addClass('gvsu_only_file');
        }

        // Add "Read More" links to item browsing
        if(jQuery('.items').find('.item.record').css('width') < '800px') {
            jQuery('.item.record').each(function() {

                var itemLink = jQuery(this).find('a.permalink').attr('href');
                jQuery(this).append('<a class="read-more" href="' + itemLink + '">View More</i>');
            });

        }
    });
</script>

</body>

</html>
