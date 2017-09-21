<div class="cms-clear"></div>
<div id="cms-content-footer" role="footer">
	<a href="https://prod.library.gvsu.edu/status/?problem" class="cms-report-problem" id="problem-link">report a problem with this page</a>
	<script>
		var thisUrl = encodeURIComponent(window.location);
		document.getElementById('problem-link').href = 'https://prod.library.gvsu.edu/status/?problem&url=' + thisUrl;
	</script>
</div>
</div>

<!-- end content -->
</div>
</div>
</div>

<!--Begin contact info-->
<div id="cms-footer-wrapper">
	<div id="cms-footer">
		<div id="cms-footer-inner">
			<ul>
			<li><h4>Address</h4>

			<p class="vcard">
			<address class="adr">

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

			</address>
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

<!--copyright links-->
  <div id="cms-copyright-wrapper">
	<div id="cms-copyright">
		<div id="cms-copyright-inner" role="contentinfo">

			<ul>
				<li>
					<a href="https://www.gvsu.edu/affirmativeactionstatement.htm">GVSU is an EO/AA Institution</a>
				</li>
				<li>
					<a href="https://www.gvsu.edu/privacystatement.htm">Privacy Policy</a>
				</li>
				<li>
					<a href="https://www.gvsu.edu/disclosures">Disclosures</a>
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
        	// Float PDF to the right
        	if(jQuery('#item-images').find('.item-file.application-pdf').length < 2) {
        		jQuery('#item-images').find('.item-file.application-pdf:first-child').css('float','right').css('margin-right','24%').css('margin-top','3.6em').css('border','1px solid #bbb');
        	}
        	
            // Add special media class to make video and audio larger
            jQuery('#item-images').find('video').closest('div.item-file').addClass('gvsu_media');
            jQuery('#item-images').find('audio').closest('div.item-file').addClass('gvsu_media');
            jQuery('#item-images').find('.image-jpeg:first').css('clear','left');
            var imagePosition = (jQuery('.image-jpeg').index()) +1;
            jQuery('.item-file:nth-child(' + imagePosition + ')').before('<div class="cms-clear" style="width: 100%;"><h3>Supplementary Images</h3></div>');

            // Enumerate the video clips
            var vidN = 1;
            jQuery('#item-images').find('.video').each(function() {
            	jQuery(this).before('<h4>Video ' + vidN + '</h4>');
            	vidN++;
            });

        } else {
        	if(jQuery('#item-images').find('.video').length > 0) {
        		jQuery('#item-images').find('div.item-file').addClass('gvsu_only_video');
        	} else {
        		jQuery('#item-images').find('div.item-file').addClass('gvsu_only_file');
        	}
            
        }

        // Add "Read More" links to item browsing
        if(jQuery('.items').find('.item.record').css('width') < '800px') {
            jQuery('.item.record').each(function() {

                var itemLink = jQuery(this).find('a.permalink').attr('href');
                jQuery(this).append('<a class="read-more" href="' + itemLink + '">View More</i>');
            });

        }

        // Isolate Vets History Collection in browse, fix PDFs with default thumbnail
		function getQueryVariable(variable)
		{
		       var query = window.location.search.substring(1);
		       console.log(query);
		       var vars = query.split("&");
		       console.log(vars);
		       for (var i=0;i<vars.length;i++) {
		               var pair = vars[i].split("=");
		               if(pair[0] == variable){return pair[1];}
		       }
		       return(false);
		} 

		if(getQueryVariable('collection') == 30) {
			
			// Vets History Collections Page

			jQuery('div.item-img').find('img').each(function() {
				if(jQuery(this).attr('src') == 'https://digitalcollections.library.gvsu.edu/application/views/scripts/images/fallback-file.png') {
					jQuery(this).attr('src','https://prod.library.gvsu.edu/labs/omeka/vetsThumbnail.jpg').css('border','1px solid rgb(187,187,187)');
				}
			});

		}

        // Isolate Vets History videos on item record pages, fix PDFs without thumbnails

		var vetsThumb = 'https://prod.library.gvsu.edu/labs/omeka/vetsThumbnail.jpg';

		if((jQuery('#dublin-core-relation').length > 0) && (jQuery('#dublin-core-relation .element-text').text() == 'Veterans History Project (U.S.)')) {

		console.log('This is a vets history item page');
			
			// Vets History Item record page (or at least a related collection)
			jQuery('#item-images').find('.item-file.application-pdf').find('a').each(function() {

				console.log('Checking PDF link for thumbnail image');

				if(jQuery(this).find('img').length <= 0) { // No image
				    console.log('No image - adding thumbnail');

				    // Code to add thumbnail image
					jQuery(this).html('<img src="' + vetsThumb + '" class="thumb" alt="Outline of Vets History Interview" />');

					// Code to add styles to parent element for proper display
					jQuery(this).parent('.item-file.application-pdf').css('margin-top','3.6em').css('border','1px solid rgb(187,187,187)');
				}

			});

		}

        // Hide OCRed PDF text unless it is asked for
        if(jQuery('#pdf-text-text').length > 0) {
	
			jQuery('#pdf-text-text').before('<span id="pdf-text-toggle" style="cursor:pointer;color:#0000ee;text-decoration:underline;display:block;margin:.75em 0;">Show Scanned Text</span>');
			jQuery('#pdf-text-text').hide();

			jQuery('#pdf-text-toggle').click(function() {
				if(jQuery('#pdf-text-toggle').text() == 'Show Scanned Text') {
					jQuery('#pdf-text-toggle').text('Hide Scanned Text');
					jQuery('#pdf-text-text').slideDown(800);
				} else {
					jQuery('#pdf-text-toggle').text('Show Scanned Text');
					jQuery('#pdf-text-text').slideUp(200);
				}
				
			});

		}
    });
</script>

</body>

</html>
