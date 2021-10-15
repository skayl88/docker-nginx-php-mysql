<?php
/**
 * Шаблон обычной страницы (page.php)
 * @package WordPress
 * @subpackage eveXA-clean-theme
 */
get_header(); // подключаем header.php ?>
<div class="boxes-content pt-2 mb-2">
    <div class="container">
        <div class="privacy-txt">
            
                            
                
<h1 class="page-title"><?php the_title(); ?></h1>

<?php the_content(); ?>
                
            
            
        </div>
        
        <div class="contacts-form">
            <div class="httl">Отправить запрос</div>
            <p>
                Мы приложим все усилия, чтобы ответить на запросы, требующие индивидуального подхода, в течение 48 часов.<br/>
                Если вы предпочитаете связаться с нами по телефону или факсу, используйте раздел «Глобальная директория офисов «Oxi Group»» для поиска ближайшего отделения.
            </p>
            <div class="form2">
                <form class="mail_ajax">
                    <div class="line">
                        <div class="c2">
                            <div class="inp">
                                <input type="text" name="Имя" required placeholder="Ваше имя"/>
                            </div>
                        </div>
                        <div class="c2">
                            <div class="inp">
                                <input type="text" name="Отчество" placeholder="Отчество"/>
                            </div>
                        </div>
                        <div class="c2">
                            <div class="inp">
                                <input type="text" name="phone" required placeholder="Контактный телефон"/>
                            </div>
                        </div>
                        <div class="c2">
                            <div class="inp">
                                <input type="text" name="Почта" placeholder="Ваш email"/>
                            </div>
                        </div>
                    </div>
                    <div class="inp">
                        <textarea name="Сообщение" placeholder="Сообщение"></textarea>
                    </div>
                    <div class="inp">
                        <label class="custom-checkbox"><input type="checkbox" name="" checked><span class="checkmark"></span>  Я прочитал(а) и принимаю  <a target="_blank" href="">условия Положения о конфиденциальности.</a></label>
                    </div>
                    <div class="btn-box">
                        <button type="submit" class="btn2">ОТПРАВИТЬ</button>
                    </div>
                    
                    
                </form>
                
            </div>
        </div>
    </div>
</div>



<?php get_footer(); // подключаем footer.php ?>