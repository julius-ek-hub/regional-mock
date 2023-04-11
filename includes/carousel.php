<?php $carousel_progress = ''; ?>

<div class="carousel">
    <div class="carousel-items">
        <?php 
        foreach (CONSTANTS['carousel_images'] as $key => $value) {
            echo "<div class='carousel-item'> <img src='$value' /></div>";
            $carousel_progress .= ("<button" . ($key == 0 ? " class = 'active'" : "") . "></button>");
        }
        ?>
    </div>
        <div class="carousel-shade"></div>
        <div class="carousel-btns">
            <div class = "carousel-nav prev"></div>
            <div class = "carousel-nav next"></div>
        </div>
        <div class="carousel-progress"><?php echo $carousel_progress; ?></div>
</div>