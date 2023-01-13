# Отчет по лабораторной работе №1: "HTTP аутентификация"

## Цель работы:
Спроектировать и разработать систему авторизации пользователей на протоколе HTTP.

## Ход работы
### Пользовательский интерфейс

###### Диаграма работы программы
Диагамма представлена в файле **diagram.png**

<image src="diagram.png" style="background: white">

---

При входе на сайт пользователь попадает на страницу ***/index.php***, которая является заглавной страницей сайта. Где распологается две формы: форма авторизации и форма регистрации.
###### 1. **login.php**
Это скрипт, который выполняется при нажатии на кнопку "Войти" на странице ***/index.php***. Делается запрос в базу данных, откуда берется строка с введенным в форме логином и хеш пароля соответственно. С помощью функции `password_verify($_POST['pass'], $row['pass'])` сверяется введенный пароль с хешем из базы данных. Если возникает ошибка то идет переадресация на страницу ***/no_user.html***. Если ошибки не возникает, то пользователь попадает ну все ту же страницу ***/index.php***, но уже содержащую COOKIE, которые хранят логин пользователя.
###### 2. **check.php**
Это скрипт, который выполняется при нажатии на кнопку "Зарегистрироваться" на странице ***/index.php***. Основная задача - регистрация новых пользователей. Значения логина, пароля и подтверждение пароля записываются в соответствующие переменные. Пароль сравнивается с подтвержденным паролем и если они не совпадают то выводится соответствующая ошибка. Также если неверно введен логин или сам пароль то так же выводится ошибка. Выполняется подключение к базе данных, по запросу из которой проверяется не был ли пользователь с таким логином зарегистрирован ранее, если такой пользователь был найден, то выводится соответствующаю ошибка. Далее в базу данных заносятся логин и хешированный пароль, который хешируется с помощь функции `password_hash($pass, PASSWORD_DEFAULT)`

Аналогично с формой входа, происходит редирект на ту же страницу но уже с куки.
###### 3. **index.php**
На странице ***/index.php*** идет проверка на наличие COOKIE, если проверка пройдена, значит пользователь уже авторизирован, отображется кнопка выхода, при клике на которую происходит редирект на страницу ***/exit.php***, если COOKIE не найдено но отображается форма входа и авторизации.
###### 4. **exit.php**
Скрипт, который удаляет COOKIE у пользователя.

### Структура базы данных
#### user_data
| id | login | pass |

В этой таблице:

- **id** - идентификатор пользователя (int), ключевое значение с автоматическим инкрементом;

- **login** - имя пользователя (varchar(100));

- **pass** - хэш пароля (varchar(60));

### Вывод
Спроектировал и разработал простейшую систему авторизации пользователей на протоколе HTTP.
