<h2>ТЗ к заданию:</h2>
В качестве предметной области (ПО) рассматривается посредническая фирма, где ведется учет поступающих товаров, отгруженных товаров, оплат за поставленную и отгруженную продукцию.
В процессе договорной кампании составляются договора на поставку и реализацию товаров. В договоре должны содержаться реквизиты заказчика и поставщика, предмет поставки, сведения о нем, сроки поставки. 

<h2>В проекте реализованно:</h2>
1. CRUD БД <br>
2. Миграции по созданию таблиц, триггеров, хранимых процедур <br>
3. Модели к сущностям и сравнение запросов к БД: у всех сырых запросов есть аналог этого же запроса с помощью Eloquent'а <br>
4. Ресурсные контроллеры <br>
5. Вывод сообщение об ошибках на страницу с формой <br>

<h2>Обновления:</h2>
1. Добавлены factories, seeders и pagination для сущностей Company и Shipment<br>
2. Не дефолтная валидация перемещена из контроллеров в Rules<br>
3. Часть логики вынесена из контроллеров в Services<br>
