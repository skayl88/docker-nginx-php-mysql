<?

#Template Name: Цены

get_header();

?>

<div class="b1 b1-3">
    <div class="container">
            <div class="price-box-wide" >
                <div class="page-title">Расчет цены</div>
                <div class="inner0">
					<p class="salettl">
					
						В честь начала Нового учебного года дарим новым пользователям скидку 55%!
</p>
					 <p class="salep">*Акция действует до 30.09.2021 для новых пользователей, только при покупке лицензии на 1 год.<br> Цена включает в себя все модули и последующие обновления.</p>
                    <div class="inner dop-border" id="dop-border">
                        <div class="c1 cena">
<div  id="fransh" class='hiden'>
<div class="ttl">Свяжитесь с нами для уточнения цены  </div>
<div class="btn-box"><a class="btn3" href="https://ollaberkana.ru/kontakty/">Связаться</a></div>
</div>
               <div class="calc-display" id="clcdisplay">
                   <div class="calc-dispaly-container">
                        <div class="calc-dispalay-place" id="mounts-inf">
                      
                            <H2 id="rangeValue">1 год</H2>
                            <p>Время использования</p>
                        </div>
                        <div class="calc-operator">=</div>
                        <div class="calc-dispalay-place">
                      <p class='pcena 'id="cmount">13 500 ₽ </p>
						<p id='pcenaOld'id="cmount">30 000 ₽ </p>
							
                        <p id='priceMounth' class="dopText">1 125 ₽ в месяц </p>
                            </div>
                            <div class="calc-operator onlydop hiden">+</div>
                        <div class="calc-dispalay-place onlydop hiden">
                      <p class='pcena 'id="cexel">0</p>
                        <p>Дополнительные услуги</p>
                            </div>
                            <div class="calc-operator onlydop  hiden">=</div>
                            <div class="calc-dispalay-place onlydop hiden">
                         <p class='pcena' id="ctotal">2 500 ₽ </p>
                        <p></p>
                            </div>
                   </div>
            
               </div>       
                        </div>  
                    </div>
                        <div id="range">
                            <input type="range" class="range" id="range2" value="4" min="1" max="6" onmousemove="rangeSlider(this.value)" onchange="rangeSlider(this.value)">

                          <div class="point"> <p>1 месяц</p></div>
                          <div class="point month3" id='month3'> <p>3 месяца</p></div>
                          <div class="point month6" id='month6'> <p>6 месяцев</p></div>
                          <div class="point month12 sale"id="month12"> <p class='year'>1 год</p></div>
                           <div class="point inf" id="inf">  <p>Купить навсегда</p></div>
                          <div class="point fransh" id= "fransh"> <p>Для фрашиз</p></div>
                        </div>
</div>
                <div class="dop">
                 
                <div class="inner3">
                <div class="dop-title">
                     <div class="ttl">Дополнительно</div>
                     <p> Разовая  оплата</p>
                    </div>
                    <div class="inner exel">
                    <div class="checkbox-price">
                        <button class="btn-dop" id="check_exel"  data-name="exel">
</div>
                        <div class="inf">   
                        <div class="price1" id="exel_inf">
Бесплатно</div>
                        <p>перенос базы из эксель</p>
                        </div>
                        
                       
                     </div>
                     <div class="inner exel_plus">
                         <div class="checkbox-price">

                         <button class="btn-dop" id="check_exel_plus"  data-name="exel+">
                         </div>
                     
                        
                        <div class="inf">   
                        <div class="price1">9 000 ₽</div>
                        <p>Перенос базы из excel, 3 <br>
видеоурока с оператором</p>
                        </div>
                        
                       
                     </div>
                     <div class="inner fransh_btn" id="fransh_btn">
                     <div class="checkbox-price">
                     <button class="btn-fransh" id="check_fransh"  data-name="fransh">
</div>
                        
                        <div class="inf">   
                        <div class="price1">800 ₽/мес</div>
                        <p>Дополнительный филиал</p>
                        </div>

                     </div>
                </div>
            </div>
						<p class="sale_calc">
				**Для постоянных пользователей системы сохраняется цена на продление в размере 22 560 рублей в год.</p>
        </div>
        
        
        </div>
        <div class="page-btn-box">
    <div class="container">
        <div class="btns">
            <a  id="btn-buy" class="btn3 btn-buy" href="">Оставить заявку</a>
            <a id="btn-demo" class="btn4 btn-demo" href=""><span>Получить 10 дней бесплатно</span></a>
        </div>
    </div>
</div>
					  <div class="items5-list v2 new">
        <a class="c1" href="<?php echo get_page_link(184); ?>" style="text-decoration: none;">
            <div class="box">
                <div class="promo">
                    <p>Новый</p>
                </div>
                <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/chatbot.svg"
                           /></span></div>
                <p>Чат боты</p>
            </div>
        </a>
        <a class="c1" href="<?php echo get_page_link(188); ?>" style="text-decoration: none;">
            <div class="box">
                <div class="promo">
                    <p>Новый</p>
                </div>
                <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/calendar.svg"
                          /></span></div>
                <p>Виджет "Расписание"</p>
            </div>
        </a>
        <a class="c1" href="<?php echo get_page_link(186); ?>" style="text-decoration: none;">
            <div class="box">
                <div class="promo">
                    <p>В разработке</p>
                </div>
                <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/whatsapp_icon.svg"
                            /></span></div>
                <p> WhatsApp</p>
            </div>
        </a>

    </div>
        <div class="items5-list v2">
            <a class="c1" href="<?php echo get_page_link(30); ?>" style="text-decoration: none;">
                <div class="box">
                    <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/customer.svg" alt="" /></span></div>
                    <p>Учет клиентов</p>
                </div>
            </a>
            <a class="c1" href="<?php echo get_page_link(33); ?>" style="text-decoration: none;">
                <div class="box">
                    <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/calendar.svg" alt="" /></span></div>
                    <p>Расписание учеников</p>
                </div>
            </a>
            <a class="c1" href="<?php echo get_page_link(35); ?>" style="text-decoration: none;">
                <div class="box">
                    <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/checklist.svg" alt="" /></span></div>
                    <p>Планирование задач</p>
                </div>
            </a>
            <a class="c1" href="<?php echo get_page_link(37); ?>" style="text-decoration: none;">
                <div class="box">
                    <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/target.svg" alt="" /></span></div>
                    <p>Маркетинг</p>
                </div>
            </a>
            <a class="c1" href="<?php echo get_page_link(39); ?>" style="text-decoration: none;">
                <div class="box">
                    <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/support.svg" alt="" /></span></div>
                    <p>Телефонный помощник</p>
                </div>
            </a>
            <a class="c1" href="<?php echo get_page_link(41); ?>" style="text-decoration: none;">
                <div class="box">
                    <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/send-mail.svg" alt="" /></span></div>
                    <p>Рассылки</p>
                </div>
            </a>
            <a class="c1" href="<?php echo get_page_link(43); ?>" style="text-decoration: none;">
                <div class="box">
                    <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/income.svg" alt="" /></span></div>
                    <p>Учет финансов и товаров</p>
                </div>
            </a>
            <a class="c1" href="<?php echo get_page_link(45); ?>" style="text-decoration: none;">
                <div class="box">
                    <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/pos.svg" alt="" /></span></div>
                    <p>Кассы</p>
                </div>
            </a>
            <a class="c1" href="<?php echo get_page_link(47); ?>" style="text-decoration: none;">
                <div class="box">
                    <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/review.svg" alt="" /></span></div>
                    <p>Журнал успеваемости</p>
                </div>
            </a>
            <a class="c1" href="<?php echo get_page_link(49); ?>" style="text-decoration: none;">
                <div class="box">
                    <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/gift-card.svg" alt="" /></span></div>
                    <p>Бонусная программа</p>
                </div>
            </a>
        </div>
    </div>
</div>  
<div class="page-btn-box">
    <div class="container">
      <div class="btn-box  mt50">
			<a id="btn_modul" class="btn1" href="moduli/">Узнать подробнее</a>
                 
                </div>
    </div>
</div>

<div class="helpyou v2">
   <div class="container">
        <div class="httl">Berkana создана специально для</div>
        <div class="d-flex">
            <a class="c1" href="<?php echo get_page_link(54); ?>" style="text-decoration: none;">
                <div class="box">
                    <div class="ttl">Детских центров</div>
                    <div class="txt">
                        <p>
                            Включает в себя необходимый <br>
набор функций для <br>
полной автоматизации <br>
вашего детского центра
                        </p>
                    </div>
                    <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/hy1.png" alt="" /></div>
                </div>
            </a>
            
            <a class="c1" href="<?php echo get_page_link(58); ?>" style="text-decoration: none;">
                <div class="box">
                    <div class="ttl">Языковых школ</div>
                    <div class="txt">
                        <p>
                           Освобождает <br>
администраторов<br>
от рутины, позволяет <br>
составлять расписание
                        </p>
                    </div>
                    <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/hy3.png" alt="" /></div>
                </div>
            </a>
			<a class="c1" href="<?php echo get_page_link(56); ?>" style="text-decoration: none;">
                <div class="box">
                    <div class="ttl">Детских садов</div>
                    <div class="txt">
                        <p>
                           Дает возможность заводить <br>
карточки клиентов<br>
в виде целой семьи, <br>
удобно вести базу данных
                        </p>
                    </div>
                    <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/hy2.png" alt="" /></div>
                </div>
            </a>
            <a class="c1" href="<?php echo get_page_link(60); ?>" style="text-decoration: none;">
                <div class="box">
                    <div class="ttl">Учебных центров</div>
                    <div class="txt">
                        <p>
                            Имеется функция <br>
создания абонементов, <br>
с помощью которых <br>
легко отследить посещения
                        </p>
                    </div>
                    <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/hy4.png" alt="" /></div>
                </div>
            </a> 
            <a class="c1" href="<?php echo get_page_link(62); ?>" style="text-decoration: none;">
                <div class="box v2">
                    <div class="ttl">Игровых центров</div>
                    <div class="txt">
                        <p>
                         Контролирует время входа и выхода<br>
из тайм-зоны каждого клиента <br>
и автоматически считает <br>
стоимость посещения
                        </p>
                    </div>
                    <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/hy5.png" alt="" /></div>
                </div>
            </a>
            <a class="c1" href="<?php echo get_page_link(64); ?>" style="text-decoration: none;">
                <div class="box v3">
                    <div class="ttl">Сети организаций</div>
                    <div class="txt">
                        <p>
                           Дает возможность просматривать <br>
данные по отдельному филиалу,<br>
либо сразу по всем <br>
организациям
                    </div>
                    <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/hy6.png" alt="" /></div>
                </div>
            </a>
        </div>
</div>
<div class="btn-box tc mt50">
		  <a  id="btn_quiz" class="btn3  btn_quiz" href="">Пройти бесплатное обучение</a>
                 
                </div>
</div>




<?get_footer();?>
