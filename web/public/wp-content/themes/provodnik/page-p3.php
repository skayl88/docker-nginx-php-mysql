<?

#Template Name: Аренда переговорных


get_header();

?>

<div class="container">
        <div class="txt">
            <h1 class="site-title">
                <?php the_field('b1_title'); ?>
            </h1>
            <p>
                <?php the_field('b1_text'); ?><br/>
                <?php $link = get_field('b1_phone'); ?>
                <a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
            </p>
            <div class="btn-box">
                <?php $link = get_field('b1_btn'); ?>
                <div class="btn1" data-toggle="modal" data-target="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></div>
            </div>
        </div>
    </div>
</div>

<div class="b2 wide">
    <div class="container">
        <div class="inner">
            <div class="httl">
                <?php the_field('b2_title'); ?>
            </div>
            
            <?php the_field('b2_text'); ?>
        </div>
    </div>
    <div class="down-arrow"><img src="<?php echo get_template_directory_uri(); ?>/img/darrow.png" alt="" /></div>
</div>

<div class="black-httl v2">
    <div class="httl w">
        <?php the_field('b3_title'); ?>
    </div>
</div>

<div class="services-box">
    <div class="container">
        <p class="w800">
            <?php the_field('b4_text'); ?>
        </p>
        <div class="d-flex">
            <?php
            $rows = get_field('b4_items');
            if($rows){
                foreach ($rows as $row) {
                    ?>
                    <div class="col1">
                        <div class="box pb-0">
                            <div class="img"><img src="<?php echo $row['img']['url']; ?>" alt="<?php echo $row['img']['alt']; ?>" /></div>
                            <div class="ttl"><?php echo $row['title']; ?></div>
                            <div class="txt">
                            <?php echo $row['text']; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<div class="black-httl v2" style="background: url('<?php echo get_template_directory_uri(); ?>/img/cvt2.jpg') center top no-repeat;">
    <div class="httl w">
        <?php the_field('b5_title'); ?>
    </div>
</div>

<div class="why-box">
    <div class="container">
        <div class="httl mb-3"><?php the_field('b6_title'); ?></div>
        <p class="mb-5">
            <?php the_field('b6_text'); ?>
        </p>
        <div class="row">
            <?php
            $rows = get_field('b6_items');
            if($rows){
                $ccount = 0;
                foreach ($rows as $row) {
                    $class = 'col-md-6';
                    if($ccount == 4){ $class = 'col-12'; }
                    ?>
                    <div class="<?php echo $class; ?>">
                        <div class="w-box">
                            <div class="img"><img src="<?php echo $row['img']['url']; ?>" alt="<?php echo $row['img']['alt']; ?>" /></div>
                            <div class="ttl"><?php echo $row['title']; ?></div>
                            <div class="txt"><?php echo $row['text']; ?></div>
                        </div>
                    </div>
                    <?php
                    $ccount++;
                }
            }
            ?>
        </div>
        <p class="mt-5">
            <?php the_field('b6_text_2'); ?>
        </p>
        <div class="btn-box">
            <?php $link = get_field('b6_btn'); ?>
            <a class="btn1" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
        </div>
    </div>
</div>

<div class="price-box v2">
    <div class="container">
        
        <div class="inner">
            <div class="txt">
                <div class="httl"><?php the_field('b7_title'); ?></div>
                <div class="price"><?php the_field('b7_price'); ?></div>
                <?php the_field('b7_text'); ?>
                <div class="list">
                    <?php
                    $rows = get_field('b7_items');
                    if($rows){
                        foreach ($rows as $row) {
                            ?>
                            <div class="item">
                                <div class="num"><?php echo $row['title']; ?></div>
                                <span><?php echo $row['text']; ?></span>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="black-httl v2" style="background: url('<?php echo get_template_directory_uri(); ?>/img/cvt3.jpg') center top no-repeat;">
    <div class="httl w">
        <?php the_field('b8_title'); ?>
    </div>
</div>

<div class="partners-boxes">
    <div class="container">
        <div class="row">
            <?php
            $rows = get_field('b9_items');
            if($rows){
                foreach ($rows as $row) {
                    ?>
                     <div class="col-md-6 mb-3">
                        <div class="box" style="background: url('<?php echo $row['fon']['url']; ?>') center center no-repeat;">
                            <div class="ttl"><?php echo $row['title']; ?></div>
                            <p><?php echo $row['text']; ?></p>
                            <div class="addr"><?php echo $row['adres']; ?></div>
                            <div class="price"><?php echo $row['price']; ?></div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>      
    </div>
</div>

<div class="why2-box v2 pt-0">
    <div class="container">
        <div class="tick2"></div>
        <div class="httl"><?php the_field('b10_title'); ?></div>
        <div class="row mb-5">
            <?php
            $rows = get_field('b10_items');
            if($rows){
                foreach ($rows as $row) {
                    ?>
                    <div class="col-lg-4">
                        <div class="box">
                            <div class="ttl"><?php echo $row['title']; ?></div>
                            <div class="tick"></div>
                            <div class="txt">
                            <?php echo $row['text']; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        
        <div class="tick2"></div>
        <div class="httl mb-4"><?php the_field('b10_title_2'); ?></div>
        <p class="w800 text-center">
            <?php the_field('b10_text'); ?>
        </p>
        
    </div>
</div>

<div class="black-httl v2" style="background: url('<?php echo get_template_directory_uri(); ?>/img/cvt4.jpg') center top no-repeat;">
    <div class="httl w">
        <?php the_field('b11_title'); ?>
    </div>
</div>

<div class="contacts-box">
    <div class="container">
        <div class="ttl1"><?php the_field('b9_title_2', 7); ?></div>
        <div class="row mt-5">
            <div class="col-lg-5 mb-4">
                <div class="form1">
                    <input type="hidden" name="ym_target" id="ym_target" value="<?php the_field('b9_target', 7); ?>"> 
                    <form class="mail_ajax">    
                        <input type="hidden" name="admin_email" value="<?php the_field('b9_email', 7); ?>">    
                        <input type="hidden" name="IP" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">   
                        <div class="inp">
                            <input type="text" name="Имя" placeholder="Ваше имя"/>
                        </div>
                        <div class="inp">
                            <input type="text" name="Почта" placeholder="Ваш e-mail"/>
                        </div>
                        <div class="inp">
                            <input type="text" name="Телефон" required placeholder="Ваш телефон"/>
                        </div>
                        <div class="inp my-4">
                            <label class="custom-checkbox"><input type="checkbox" name="" checked required><span class="checkmark"></span> Нажимая кнопку «Отправить», я даю свое согласие
на  <a target="_blank" href="/politika-konfidenczialnosti/">обработку моих персональных данных.</a></label>
                        </div>
                        <button type="submit" class="btn1">ОТПРАВИТЬ ЗАЯВКУ</button>                    
                    </form>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="contacts">
                    <p>
                        <?php the_field('b9_text', 7); ?>
                    </p>
                    <div class="boxes">
                        <?php
                        $rows = get_field('b9_items', 7);
                        if($rows){
                            foreach ($rows as $row) {
                                ?>
                                <div class="box">
                                    <div class="ico"><img src="<?php echo $row['img']['url']; ?>" alt="<?php echo $row['img']['alt']; ?>" /></div>
                                    <div class="ttl"><?php echo $row['title']; ?></div>
                                    <span><?php echo $row['text']; ?></span>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?get_footer();?>