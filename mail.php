<? //Проверка отправилось ли наше поля name и phone, а также не пустые ли они
if((isset($_POST['name'])&&$_POST['name']!="")&&(isset($_POST['phone'])&&$_POST['phone']!="")){ 
    //удаляем ненужные пробелы функцией trim и превращаем html-символы в спецсимволы в целях
    //безопасности
    $name = htmlspecialchars(trim($_POST['name']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $to = 'nvzinchenko@gmail.com'; //Почта получателя, через запятую можно указать сколько угодно адресов
    $subject = 'Обратный звонок'; //Заголовок сообщения
    $message = '
             <html>
                <head>
                   <title>'.$subject.'</title>
                </head>
                <body>
                   <p>Имя: '.$name.'</p>
                   <p>Телефон: '.$phone.'</p>                        
                 </body>
              </html>'; //В тексте отправляемого сообщения можно использовать HTML теги
     $headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
     $headers .= "From: Отправитель <email_from@yoursite.com>\r\n"; //Наименование и почта отправителя
     mail($to, $subject, $message, $headers); //Отправка письма с помощью php-функции mail
     echo "Письмо отправлено"; // необязательная стока, которая будет видна потом в консоли или
     //выведется пользователю, если в браузере будет отключен JS
}
else echo '<p>Заполните, пожалуйста, поля <a href="./index.html">формы</a></p>'; // будет выведено, если 
//поля формы заполнены неверно. index.html - это файл с вашей формой. Подставьте сюда нужное имя файла.
?>
