<?php /* Block Name: Map Block; dev: Jahid */ ?>

<?php
$map_url = get_field('map_url');

?>

<!-- Map -->
<?php if (!empty($map_url)) : ?>
    <div class="map-wrap position-relative">
        <?php echo $map_url; ?>
    </div>
<?php endif; ?>

<!-- Map End -->