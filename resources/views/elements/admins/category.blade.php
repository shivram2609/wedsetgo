<?php   
      echo $this->Html->css(array('admin/chosen.min'));   
      echo $this->Html->script('admin/chosen.jquery.min'); 
     
?>
<style>
.category, .item, .chzn-container-single .chzn-single {
    font-family: sans-serif}

.category {font-weight: bold}

.chzn-results li.item {padding-left: 25px;}
.chosen-container.chosen-container-multi {
    width: 500px !important; /* or any value that fits your needs */
}
</style>

<div class="choosen_<?php echo $slug; ?>">
<select id="choosen_list_<?php echo $slug_id; ?>" class="chzn-select" data-id="<?php echo $slug_id; ?>" multiple = "multiple" style="width: 350px">    
    <option disabled>Please select..</option>
    <?php if(!empty($categories)){
        foreach($categories as $cat) { ?>  
            <optgroup label="<?php echo $cat['Category']['name'];?>">
                 <?php foreach($cat['SubCat'] as $subcat ){  
                     $selected = (in_array($subcat['id'],$selected_cat))? 'selected=selected':''; 
                ?>
                <option value="<?php echo $subcat['id'];?>" <?php echo $selected; ?> ><?php echo $subcat['name'];?></option>
                 <?php } ?>
            </optgroup>
        <?php } ?>  
    <?php }?>
</select> 
<?php if('product' === $slug) { ?>
    <div class="choosen_prod_<?php echo $slug_id; ?>" data-id="<?php echo $slug_id; ?>">
        <h3 class="choose-select-heading">Select Products</h3>
        <select class="chzn-product-select" id="choosen_product_<?php echo $slug_id; ?>" multiple = "multiple" style="display:none;">
                <option disabled>Please select..</option>
            <?php foreach($product_list as $key=>$value) { 
                $selected = (in_array($key,$sel_products_ids))? 'selected=selected':'';                 
            ?>
                <option value="<?php echo $key; ?>" <?php echo $selected; ?> ><?php echo $value; ?></option>
            <?php } ?>
        </select>
    </div>
<?php } ?> 
</div>