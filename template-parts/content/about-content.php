<?php
$group_1 = !empty(get_field('group_content_1')) ? get_field('group_content_1') : '';
if(!empty($group_1['content_layout_option'])) { $group_1_option = $group_1['content_layout_option'] == 'reversed' ? 'flex-row-reverse' : ''; }
$group_1_content_1 = !empty($group_1['content_1']) ? $group_1['content_1'] : '';
$group_1_content_2 = !empty($group_1['content_2']) ? $group_1['content_2'] : '';

$group_2 = !empty(get_field('group_content_2')) ? get_field('group_content_2') : '';
if(!empty($group_2['content_layout_option'])) { $group_2_option = $group_2['content_layout_option'] == 'reversed' ? 'flex-row-reverse' : ''; }
$group_2_content_1 = !empty($group_2['content_1']) ? $group_2['content_1'] : '';
$group_2_content_2 = !empty($group_2['content_2']) ? $group_2['content_2'] : '';
?>


<section class="about-content px-3 p-md-0">
    <div class="container py-4">
         <div class="row p-3">
            <div class="col col-12 text-center">
                <h2 class="fw-semibold text-dark">About Us</h2>
            </div>
        </div>
        <div class="row py-2 <?php echo $group_1_option; ?>">
            <div class="col col-12 col-md-6 d-flex justify-content-center align-items-center ">
                <div>
                    <?php echo $group_1_content_1; ?>
                </div>
            </div>
            <div class="col col-12 col-md-6 d-flex justify-content-center align-items-center">
                <div>
                    <?php echo $group_1_content_2; ?>   
                </div>
            </div>
        </div>
          <div class="row py-2 <?php echo $group_2_option; ?>">
            <div class="col col-12 col-md-6 d-flex justify-content-center align-items-center">
                <div>
                    <?php echo $group_2_content_1; ?>
                </div>
            </div>
            <div class="col col-12 col-md-6 d-flex justify-content-center align-items-center">
                <div>
                    <?php echo $group_2_content_2; ?>
                </div>
            </div>
        </div>
    </div>
</section>