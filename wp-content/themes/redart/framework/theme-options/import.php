<!-- #import -->
<div id="import" class="bpanel-content">

    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel"> 
            <li><a href="#tab1"><?php esc_html_e('Import Demo', 'redart');?></a></li>
        </ul>

        <?php $avail_demos = array('redart' => 'Redart', 'aquarium' => 'Aquarium', 'bike' => 'Bike', 'fitness' => 'Fitness', 'model' => 'Model', 'wine' => 'Wine'); ?>

        <!-- #tab1-import-demo -->
        <div id="tab1" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
                <div class="box-title">
                    <h3><?php esc_html_e('Import Demo', 'redart');?></h3>
                </div>

                <div class="box-content dttheme-import">
                    <p class="note"><?php esc_html_e('Before starting the import, you need to install all plugins that you want to use.<br />If you are planning to use the shop, please install WooCommerce plugin.', 'redart');?></p>
                    <div class="hr_invisible"> </div>
                    <div class="column one-third"><label><?php esc_html_e('Importer', 'redart');?></label></div>
                    <div class="column two-third last">
                    	<select name="demo" class="demo medium dt-chosen-select">
                        	<option data-link="javascript:void(0)" value="">-- <?php esc_html_e('Select', 'redart');?> --</option>
                            <option data-link="http://wedesignthemes.com/themes/redart/" value="redart"><?php esc_html_e('Redart', 'redart');?></option>
                            <option data-link="http://wedesignthemes.com/themes/redart/aquarium/" value="aquarium"><?php esc_html_e('Aquarium', 'redart');?></option>
                            <option data-link="http://wedesignthemes.com/themes/redart/bike/" value="bike"><?php esc_html_e('Bike', 'redart');?></option>
                            <option data-link="http://wedesignthemes.com/themes/redart/fitness/" value="fitness"><?php esc_html_e('Fitness', 'redart');?></option>
                            <option data-link="http://wedesignthemes.com/themes/redart/model/" value="model"><?php esc_html_e('Model', 'redart');?></option>
                            <option data-link="http://wedesignthemes.com/themes/redart/wine/" value="wine"><?php esc_html_e('Wine', 'redart');?></option>
                        </select>
                        <a class="lnk-onlinedemo" href="http://wedesignthemes.com/themes/redart/" target="_blank"><?php esc_html_e('Online Demo', 'redart');?></a>
                    </div>
                    <div class="hr_invisible"> </div>

                    <?php foreach($avail_demos as $avail_demo_key => $avail_demo) { ?>
                    		<div class="redart-demos <?php echo esc_attr($avail_demo_key); ?>-demo hide">
                            
                                <div class="column one-third"><label><?php esc_html_e('Import', 'redart');?></label></div>
                                <div class="column two-third last">
                                    <select name="import" class="import medium dt-chosen-select">
                                        <option value="">-- <?php esc_html_e('Select', 'redart');?> --</option>
                                        <option value="all"><?php esc_html_e('All', 'redart') ?></option>
                                        <option value="content"><?php esc_html_e('Content', 'redart') ?></option>
                                        <option value="menu"><?php esc_html_e('Menu', 'redart') ?></option>
                                        <option value="options"><?php esc_html_e('Options', 'redart') ?></option>
                                        <option value="widgets"><?php esc_html_e('Widgets', 'redart') ?></option>
                                    </select>
                                </div>
                                <div class="hr_invisible"> </div>
            
                                <div class="row-content hide">
                                    <div class="column one-third">
                                        <label for="content">Content</label>
                                    </div>
                                    <div class="column two-third last">
                                        <select name="content" class="medium dt-chosen-select">
                                            <option value="">-- <?php esc_html_e('All', 'redart');?> --</option>
                                            <option value="pages"><?php esc_html_e('Pages', 'redart');?></option>
                                            <option value="posts"><?php esc_html_e('Posts', 'redart');?></option>
                                            <option value="portfolios"><?php esc_html_e('Portfolio', 'redart');?></option>
                                            <option value="contactforms"><?php esc_html_e('Contact Forms', 'redart');?></option>
                                        </select>
                                    </div>
                                    <div class="hr_invisible"> </div>
                                </div>
                            
                            </div>
                    <?php } ?>

					<div class="row-attachments hide">
						<div class="column one-third"><?php esc_html_e('Attachments', 'redart');?></div>
						<div class="column two-third last">
							<fieldset>
								<label for="attachments"><input type="checkbox" value="0" id="attachments" name="attachments"><?php esc_html_e('Import attachments', 'redart');?></label>
								<p class="description"><?php esc_html_e('Download all attachments from the demo may take a while. Please be patient.', 'redart');?></p>
							</fieldset>
						</div>
						<div class="hr_invisible"> </div>
					</div>
                    <div class="column one-column">
						<div class="hr_invisible"> </div>
						<div class="column one-third">&nbsp;</div>
						<div class="column two-third last">
		                    <a href="#" class="dttheme-import-button bpanel-button black-btn" title="<?php esc_html_e('Import demo data', 'redart');?>"><?php esc_html_e('Import Demo Data', 'redart');?></a>
                        </div>
                    </div>

					<div class="hr"></div>
                </div><!-- .box-content -->
            </div><!-- .bpanel-box end -->            
        </div><!--#tab1-import-demo end-->

    </div><!-- .bpanel-main-content end-->
</div><!-- #import end-->