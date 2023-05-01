# bp-back
 
____

Реализована корзина, ресурсы категорий и продуктов

### список API

#### КОРЗИНА
-  `GET api/addproduct/{userId}/{productId}/{quantity}` - Добавить товар
-  `GET api/deleteproduct/{userId}/{productId}` - Удалить товар
-  `GET api/cleare/{userId}` - Очистить корзину

#### КАТЕГОРИИ
-  `GET api/category` - Все категории
-  `POST api/category` - Добавить категорию
-  `GET api/category{id}` - Категория с товарами в ней
-  `PUT api/category/{id}` - Обновить категорию
-  `DELETE api/category/{id}` - Удалить категорию

#### ПРОДУКТЫ
-  `GET api/category` - Все продукты
-  `POST api/category` - Добавить товар
-  `GET api/category{id}` - Продукт
-  `PUT api/category/{id}` - Обновить продукт
-  `DELETE api/category/{id}` - Удалить продукт


### Отношение в БД

- Категория к продуктам - одна ко многим
- Продукты к категориям - многие к одной
- Корзина к продуктам - многие ко многим
