<?php
?>
<div style="display: none" class="modal #fade #response-message" id="empModalwelcome_pop_up">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title"><!--Note: This Payment schedule does not account for Tax, Title Fees or License fees.--></h4>
                </div>
                <div class="modal-body">								
				<?php
				$allowed_html = welcome_pop_up_box_allowed_html();
				echo wp_kses($vartext1, $allowed_html);
					
				?>    
             </div>      
          </div>
     </div>
</div> 

 <?php