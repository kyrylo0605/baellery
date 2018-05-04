<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru" dir="ltr">
<head>

  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-100085457-9"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-100085457-9');
</script>

 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Поздравляем! Ваш заказ принят!</title>
	<?php
    
	// формируем массив с товарами в заказе (если товар один - оставляйте только первый элемент массива)
$products_list = array(
    1 => array( 
            'product_id' => '47',    //код товара (из каталога CRM)
            'price'      => '349', //цена товара 1
            'count'      => '1'                      //количество товара 1
    ),  
    
);
$products = urlencode(serialize($products_list));
 
// параметры запроса
$data = array(
    'key'             => 'b87d8c83cdc16dc262464859be631c4e', //Ваш секретный токен
    'order_id'        => number_format(round(microtime(true)*10),0,'.',''), //идентификатор (код) заказа (*автоматически*)
    'country'         => 'UA',                      // Географическое направление заказа
    'office'          => '1',                   // Офис (id в CRM)
    'products'        => $products,                 // массив с товарами в заказе
    'bayer_name'      => $_POST['name'],             // покупатель (Ф.И.О)
    'phone'           => $_POST['phone'],           // телефон
    'email'           => $_GET['email'],           // электронка
    'comment'         => $_GET['product_name'],    // комментарий
    'site'            => $_SERVER['SERVER_NAME'],  // сайт отправляющий запрос
    'ip'              => $_SERVER['REMOTE_ADDR'],  // IP адрес покупателя
    'delivery'        => '1',        // способ доставки (id в CRM)
    'delivery_adress' => $_GET['delivery_adress'], // адрес доставки
    'payment'         => '4',          // вариант оплаты (id в CRM)
    'utm_source'      => $_SESSION['utms']['utm_source'],  // utm_source 
    'utm_medium'      => $_SESSION['utms']['utm_medium'],  // utm_medium 
    'utm_term'        => $_SESSION['utms']['utm_term'],    // utm_term   
    'utm_content'     => $_SESSION['utms']['utm_content'], // utm_content    
    'utm_campaign'    => $_SESSION['utms']['utm_campaign'] // utm_campaign
);
 
// запрос
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://first.lp-crm.biz/api/addNewOrder.html');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$out = curl_exec($curl);
curl_close($curl);
$jout=json_decode($out); $m1=$jout -> status; foreach($jout ->message as $val) { $m2=$m2.$val; } $mess="Ответ LP-СРМ: {$m1},\nСообщение: {$m2}";
      
		  $name = iconv("UTF-8", "UTF-8", $_POST['name']);
		  
        $phone = iconv("UTF-8", "UTF-8", $_POST['phone']);
		   
    // Генерируем сообщение
	
			$message.= iconv("UTF-8", "UTF-8", "Имя: ")."$name \n";
			$message.= iconv("UTF-8", "UTF-8", "Телефон: ")."$phone \n";
    // $to -- ЗДЕСЬ ВВОДИМ ПОЧТОВЫЕ АДРЕСА, НА КОТОРЫЕ ОТПРАВЛЯТЬ РЕЗУЛЬТАТ.
      $to = "i-shiryaev@i.ua, i-shiryaeva@i.ua"; // если ящиков несколько - через запятую и пробел : "me@localhost.com, me@localhost.com"

    // $subject -- Тема письма
        $subject = "Заказ Baellerry Italia Classic";

        $headers  = "MIME-Version: 1.0";
        $headers .= "Content-type: text/html; charset=windows-1251" . "\r\n";
    // После From: -- вводим имя и адрес отправителя.
        $headers .= "From:".iconv("windows-1251", "UTF-8", "zakaz")."<zaka>" . "\r\n";

        // Отправляем
        mail($to, '=?utf-8?B?' . base64_encode($subject). '?=', $message, $headers);
    
	
?>
	
	
	
<link rel="stylesheet" type="text/css" href="order_files/index.css" media="all">

<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1827812164171780');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1827812164171780&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<!-- Событие заявка -->
<script>
  fbq('track', 'Lead');
</script>

<body>

	<div class="wrap_block_success">
		<div class="block_success">					
			<h2>Поздравляем! Ваш заказ принят!</h2>
			
<a href="more.php" class="url_more_info" target="_blank">Нажмите здесь для получения более подробной информации о заказе</a>
			<p class="success">В ближайшее время с вами свяжется оператор для подтверждения заказа. Пожалуйста, включите ваш контактный телефон.</p>
			
			<h3>Пожалуйста, проверьте правильность введенной вами информации</h3>
			<div class="wrap_list_info">
				<ul class="list_info">
					 					 <li><span>Ваш телефон: </span><?php echo $phone; ?></li> 				
					 </ul>
			</div>
			
			
	

														
								
								
				
				<p class="fail">Если вы ошиблись при заполнени формы, то, пожалуйста, <a href="index.php">заполните заявку еще раз</a></p>
				<hr>
				<br>
				<div class="clear"></div>
		
			</form>
			
		</div>

	</div>
</body>
</html>
