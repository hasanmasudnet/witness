<?php /* Block Name: Block; dev: Noman */ ?>
<?php
$show__hide = get_field('show__hide');
$heading = get_field('heading');
$content = get_field('content');
$video_url = get_field('video_url');
$thumbnail = get_field('thumbnail');
?>

<?php if ($show__hide == true) : ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="video-heading row-top-margin text-center">
                    <h2 class="mb-4"><?php echo wp_kses($heading, true) ?></h2>
                    <p><?php echo wp_kses($content, true) ?></p>
                </div>
                <?php if (!empty($video_url)) : ?>
                    <div class="macbook">
                        <div class="screen">
                            <div class="viewport" style="background-image:url('<?php echo esc_url($thumbnail); ?>');">
                                <a href="<?php echo esc_url($video_url); ?>" class="play_video popup-youtube">
                                    <svg width="189" height="189" viewBox="0 0 189 189" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.2">
                                            <path d="M164.081 94.5096L57.0623 33.0234V155.976L164.081 94.5096L57.0623 33.0234V155.976L164.081 94.5096Z" fill="white" />
                                            <path d="M94.5097 182.168C142.922 182.168 182.168 142.922 182.168 94.51C182.168 46.0976 142.922 6.85156 94.5097 6.85156C46.0973 6.85156 6.85132 46.0976 6.85132 94.51C6.85132 142.922 46.0973 182.168 94.5097 182.168Z" stroke="white" stroke-width="7" stroke-miterlimit="10" />
                                        </g>
                                    </svg>

                                </a>
                            </div>
                        </div>
                        <div class="base"></div>
                        <div class="notch"></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>