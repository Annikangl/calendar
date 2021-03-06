# calendar
 Тестовое задание Back-End
 Технологии: PHP 7, MySQL

Что сделано:
1. Создание пользователя REST API
2. Авторизация через токен полученный из регистрации
3. Запрос на создание новой задачи
4. Вывод перечня задач с пагинацией 5 штук
5. Сортировка по задачам по возрастанию/убыванию даты окончани
6. Удаление задачи по ID
7. Приложение спроектировано с учетом MVC модели

Осталось реализовать:
1. Новая генерация токена при каждом любом последующем запросе.

<h2>Документация к приложению </h2>

Приложение разрабатывалось с использованием XAMPP (Apache), поэтому если разворачивать его на другом локальном сервере, могут быть проблемы с относительными путями.

При первом входе на страницу приложение, оно попросит Вас провести процедуру авторизации с использованием логина и токена (секретного ключа). Войти можно только под существующими данными, вводимые значения сверяются с БД. Если Вы допустили ошибку в логине или секретном ключе, появится соответствующее сообщение об ошибке. 
Ниже показана форма авторизации:

![auth-form](https://user-images.githubusercontent.com/32800337/97498507-628dd200-197d-11eb-8a0e-a0e2cf4702b7.JPG)

![auth_err](https://user-images.githubusercontent.com/32800337/97498771-cf08d100-197d-11eb-9460-a6545bbb0a1e.JPG)


Чтобы получить токен авторизации, необходимо взаимодействие с <b>REST API приложения </b>
Для работы с API использовался Postman. Чтобы провести регистрацию нового пользователя, необходимо сформировать POST запрос следующего вида:
<b>localhost/calendar/api/user</b>
В теле запроса передать ключ username, где в качестве значения выступает ваше имя пользователя. Успешный запрос вернет JSON объект, который содержит статус ответа от сервера (status), ID созданного пользователя (user_id), токен (token). В случае неуспешного запроса вернется false и status_coe 400.
Пример POST запроса на регистрацию нового пользователя показан ниже

![api-1](https://user-images.githubusercontent.com/32800337/97499207-8a316a00-197e-11eb-9df3-f38c23073abc.JPG)


Теперь имея логин и токен, можно провести авторизацию. После успешной авторизации, попадаем на страницу с задачам. 
При первом входе, разумеется, никаких созданных задач у пользователя нет.

![tasks](https://user-images.githubusercontent.com/32800337/97499706-66225880-197f-11eb-8676-334ee32c54f1.JPG)



Чтобы создать задачу нажимаем "Добавить задачу" и заполняем поля задачи. Поле <b>Название задачи</b> - обязательно к заполнению!

![c-2](https://user-images.githubusercontent.com/32800337/97358812-d613de80-18ac-11eb-85f9-55b631d84128.JPG)

При успешном создании задачи получаем соответсвующее сообщение:

![c-3](https://user-images.githubusercontent.com/32800337/97358953-12473f00-18ad-11eb-974f-5487d068eb06.JPG)

Сортировать задачи можно по возрастанию или убыванию даты окончания задачи. Сортировка работает с использованием GET параметров.

![c-4](https://user-images.githubusercontent.com/32800337/97359149-5c302500-18ad-11eb-953f-903db4e3edb4.JPG)

Удалить задачу можно по кнопке "Удалить". Чтобы перейти на страницу задачи, необходимо щелкнуть по ее заголовку и отрокется страница конкретной задачи

![c-5](https://user-images.githubusercontent.com/32800337/97359288-94cffe80-18ad-11eb-9dde-554381e725ff.JPG)


Когда задач становится больше 5 штук, то срабатывает блок с пагинацией. На одной страницу может быть не больше 5 задач.

![c-6](https://user-images.githubusercontent.com/32800337/97359470-da8cc700-18ad-11eb-9e9a-5f01d02d38fe.jpg)


<h2>Работа с API </h2>

<p>Помимо создания нового пользователя API приложение еще может выводить весь список зарегистрированных пользователей. Для этого нужно сформировать GET запрос следующего вида:
 <b>localhost/calendar/api/users</b></p>
 В слеучае неудачного запроса вернется HTTP CODE 400

Получаем результат:
![api-2](https://user-images.githubusercontent.com/32800337/97500457-aafabf00-1980-11eb-8c0d-6b9acf22a458.JPG)



