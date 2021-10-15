<?



#Template Name: Квиз

get_header();

 $url1 = $_SERVER['REQUEST_URI'];
?>

<div class="">
    <div class="container">
            <div class="test" id="test" >
                
<form id="regForm" class="quest_mail_ajax" >

<!-- One "tab" for each step in the form: -->
<div class="tab">
    <div class="httl p10" >Ответь на 3 вопроса и получи эффективное решение для управления своим образовательным центром с бесплатным доступом на 10 дней!</div>

</div>
<div class="tab">

    <div class="httl">Направление вашей сферы деятельности</div>
    <div class="quest">
    <p> <input type="radio" id="contactChoice5"
        name="Сфера_деятельности" value="Учебный центр">
        <label for="contactChoice5">Учебный центр</label>
    </p>
    
    <P>
        <input type="radio" id="contactChoice4"
              name="Сфера_деятельности" value="Детский клуб">
        <label for="contactChoice4">Детский клуб</label>
    </P>

  <P><input type="radio" id="contactChoice1"
            name="Сфера_деятельности" value="Детский сад">
      <label for="contactChoice1">Детский сад</label>
    </P>
  <P><input type="radio" id="contactChoice2"
            name="Сфера_деятельности" value="Детский центр">
      <label for="contactChoice2">Детский центр</label>
  </P>


     <p>  <input type="radio" id="contactChoice3"
           name="Сфера_деятельности" value="Языкова школа" >
           <label for="contactChoice3">Языковая школа</label></p> 

    <p>  <input type="radio" id="contactChoice6"
            name="Сфера_деятельности" value="Танцевальная студия">
    <label for="contactChoice6">Танцевальная студия</label></p>

  <p>
  <input type="radio" id="contactChoice7"
          name="Сфера_деятельности" value="Спортивная школа">
    <label for="contactChoice7">Спортивная школа</label>
  </p>
   <p>
         <input type="radio" id="contactChoice8"
          name="Сфера_деятельности" value="Музыкальная школа">
    <label for="contactChoice8">Музыкальная школа</label>
   </p>
  <p> <input class="other_inp" type="text" name="Сфера_деятельности_другая"  placeholder="Другое"/></p>
    
     </div>

</div>
<div class="tab">
    <div class="httl">Какими инструментами пользуетесь для ведения учета клиентов, финансов и посещений </div>

     <div class="quest">
          <p>  <input type="radio" id="contactChoice11"
                name="Работали" value="CRM_система" >
                <label for="contactChoice11"> CRM система</label></p> 
       <P>
      <input type="radio" id="contactChoice12"
                  name="Работали" value="Программа_Exel">
          <label for="contactChoice12">Программа Exel</label>
        </P>
        <p> <input type="radio" id="contactChoice13"
                  name="Работали" value="Google_таблицы">
          <label for="contactChoice13">Google таблицы</label></p>

        <p>  <input type="radio" id="contactChoice15"
                  name="Работали" value="Бумажные_носители">
          <label for="contactChoice15">Бумажные носители</label></p>

        <p>  <input class="other_inp" type="text" name="Работали_в другом"  placeholder="Другое"/></P>
  
  </div>
 

</div>

<div class="tab">
  <div class="httl">Откуда впервые узнали о нас?</div> 
   <div class="quest">
  
      <p> <input type="radio" id="contactChoice16"name="Канал" value="Лидеры мнений">
      <label for="contactChoice16">Лидеры мнений</label></p>
      
      <P><input type="radio" id="contactChoice17" name="Канал" value="Обзоры и рейтинги CRM"> 
      <label for="contactChoice18">Обзоры и рейтинги CRM</label></P>

      <P><input type="radio" id="contactChoice19" name="Канал" value="Через знакомых">
      <label for="contactChoice19">Через знакомых</label></P>

      <P><input type="radio" id="contactChoice20" name="Канал" value="Google">
      <label for="contactChoice20">Google</label></P>

      <p><input type="radio" id="contactChoice21"name="Канал" value="Яндекс">
      <label for="contactChoice21">Яндекс</label></p> 

      <p> <input type="radio" id="contactChoice22" name="Канал" value="Социальные сети">
      <label for="contactChoice22">Социальные сети</label></p>

      <p><input type="radio" id="contactChoice23" name="Канал" value="Конференция">
      <label for="contactChoice23">Конференция</label></p>

      <p><input class="other_inp" type="text" name="Канал_другой"  placeholder="Другое"/></p>
  </div>   
</div>


<div class="tab">
    <div class="httl">Спасибо за то что прошли наш опрос! Укажите ваши данные и мы отправим вам промокод в СМС сообщении и на почтовый адрес</div>

     <div class="quest finish">
    <P> <input type="text" name="Имя"  placeholder="Введите ваше имя"/></P>
    <p> <input id="phone_kviz" type="text" name="Телефон"  placeholder="Введите ваш телефон" required/></p>
    <p> <input type="text" name="Почта"  placeholder="Введите почту" required /></p>
		 <input type="hidden" name="Страница" class="source" value="<?php echo $url1?>" />

     </div>

</div>
    <div id="error_cont" >

    <p>
      <div id = "error"class="ttl"> Выберите один из вариантов</div>    
    </p>  
      
    </div>

    <div class="down_qwiz"style="overflow:auto;">
      <div class="q_button">
        <button type="button" id="prevBtn" class="btn1" onclick="nextPrev(-1)"  >Назад</button>
        <button type="button" id="nextBtn" class="btn2 txt-b" onclick="nextPrev(1)">Далее</button>
        <button type="submit" id="SubQuest_Btn" class="btn2 txt-b"> Отправить</button> 
    </div>

<div div id="oferta">

    <div class="ttl"> *Доступно только новым пользователям</div>
</div>
    <a  class="home"href="/">    <button type="button" id="btn_home" class="btn1" action="/" >На главную</button></a>
   
</div>


<!-- Circles which indicates the steps of the form: -->

</div>
<div style="text-align:center;margin-top:30px;">
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
 


</div>
</form>

                </div>
               
    </div>


</div>

<script>var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
	document.getElementById("oferta").style.display = "block";
	document.getElementById("nextBtn").style.display = "block";

  } else {
    document.getElementById("prevBtn").style.display = "inline";
	document.getElementById("oferta").style.display = "none";
	document.getElementById("SubQuest_Btn").style.display = "none";
	document.getElementById("nextBtn").style.display = "block";
  }
  if (n == (x.length - 1)) {
	document.getElementById("SubQuest_Btn").style.display = "inline";
	document.getElementById("nextBtn").style.display = "none";
 
  } else {
	document.getElementById("SubQuest_Btn").style.display = "none";
	document.getElementById("nextBtn").style.display = "block";
    document.getElementById("nextBtn").innerHTML = "Далее";

  }
  // ... and run a function that displays the correct step indicator:
 
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
 
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
	
    document.getElementById("regForm").submit();

    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields

  var z, x, y, i, j, valid = true;
  x = document.getElementsByClassName("tab");
  
  y = x[currentTab].getElementsByTagName("input");

 
  // A loop that checks every input field in the current tab:

  for (i = 0; i < y.length; i++) {
		if(y[i].checked !== true && y[i].value == "") {
				 valid = false;
				
				 document.getElementById('error').style.display = "inline";
		}
		if(y[i].checked == true ){
			valid = true;
			
			return valid;
		}
	
			  
		
    // If a field is empty...
	
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
	  
    
  }

  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  document.getElementById('error').style.display = "none";
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}

 </script>

<?get_footer();?>
