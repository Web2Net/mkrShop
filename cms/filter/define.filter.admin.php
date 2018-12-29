<?php
if($_SESSION['lang']=="en"){
    define('FILTER_ADMIN_MOD_NAME','FILTERS');
    
    define('FILTER_ADMIN_NOTE_SAVED','Saved!');
    define('FILTER_ADMIN_NOTE_EDITOR_CAT','Edit category');
    define('FILTER_ADMIN_NOTE_EDITOR','Edit FILTERicle');
    define('FILTER_ADMIN_NOTE_EDIT','Edit');
    define('FILTER_ADMIN_NOTE_CAPTION','Caption');
    define('FILTER_ADMIN_NOTE_IMAGE','Picture');
    define('FILTER_ADMIN_NOTE_IMAGE_SIZE','Size');
    define('FILTER_ADMIN_NOTE_ATTANTION_IMAGE_SIZE','Very large size!');
    define('FILTER_ADMIN_NOTE_EDIT_IMAGE','Edit picture');
    define('FILTER_ADMIN_NOTE_CATEGORY','Category');
    define('FILTER_ADMIN_NOTE_SELECT_CATEGORY','Select a category');
    define('FILTER_ADMIN_NOTE_SHORT_DESCRIPTION','Short description');
    define('FILTER_ADMIN_NOTE_FULL_DESCRIPTION','Full description');
    define('FILTER_ADMIN_NOTE_SHOW','Show');
    define('FILTER_ADMIN_NOTE_SHOW_ONLINE','Show Online');
    define('FILTER_ADMIN_NOTE_SHOW_ALL','Show all');
    define('FILTER_ADMIN_NOTE_ATTANTION_DELETE','Are you sure you want to delete the record');
    define('FILTER_ADMIN_NOTE_MAIN_SECTION','Main section');
    define('FILTER_ADMIN_NOTE_SECTION','Section');
    define('FILTER_ADMIN_NOTE_TAG_SECTION','Tag-section');
    define('FILTER_ADMIN_NOTE_MENU_CATEGORY','Category menu');
    define('FILTER_ADMIN_NOTE_OPTIONS','Options');
    define('FILTER_ADMIN_NOTE_OPEN','Open');
        
    define('FILTER_ADMIN_BUTTON_BACK','Back');
    define('FILTER_ADMIN_BUTTON_ADD_NEW','Add new record');
    define('FILTER_ADMIN_BUTTON_VIEW_ONLINE','View online');
    define('FILTER_ADMIN_BUTTON_SAVE','Save');
    define('FILTER_ADMIN_BUTTON_DELETE','Delete');
    define('FILTER_ADMIN_BUTTON_UP','Up');
    define('FILTER_ADMIN_BUTTON_DOWN','Down');
}
elseif($_SESSION['lang']=="ru"){
    define('FILTER_ADMIN_MOD_NAME','Статьи');
    
    define('FILTER_ADMIN_NOTE_SAVED','Данные сохранены!');
    define('FILTER_ADMIN_NOTE_EDITOR_CAT','Редактор категории');
    define('FILTER_ADMIN_NOTE_EDITOR','Редактор статьи'); 
    define('FILTER_ADMIN_NOTE_EDIT','Редактировать');
    define('FILTER_ADMIN_NOTE_CAPTION','Название');
    define('FILTER_ADMIN_NOTE_IMAGE','Изображение');
    define('FILTER_ADMIN_NOTE_IMAGE_SIZE','Размер');
    define('FILTER_ADMIN_NOTE_ATTANTION_IMAGE_SIZE','Очень большой размер!');
    define('FILTER_ADMIN_NOTE_EDIT_IMAGE','Редактировать изображение');
    define('FILTER_ADMIN_NOTE_CATEGORY','Категория');
    define('FILTER_ADMIN_NOTE_SELECT_CATEGORY','Выберите категорию'); 
    define('FILTER_ADMIN_NOTE_SHORT_DESCRIPTION','Краткое описание');
    define('FILTER_ADMIN_NOTE_FULL_DESCRIPTION','Текст статьи');
    define('FILTER_ADMIN_NOTE_SHOW','Видимость');
    define('FILTER_ADMIN_NOTE_SHOW_ONLINE','Показывать на сайте');
    define('FILTER_ADMIN_NOTE_SHOW_ALL','Показывать все');
    define('FILTER_ADMIN_NOTE_ATTANTION_DELETE','Вы уверены что хотите удалить запись');
    define('FILTER_ADMIN_NOTE_MAIN_SECTION','Главная секция');
    define('FILTER_ADMIN_NOTE_SECTION','Секция');
    define('FILTER_ADMIN_NOTE_TAG_SECTION','Тег-секция');
    define('FILTER_ADMIN_NOTE_MENU_CATEGORY','Меню категорий');
    define('FILTER_ADMIN_NOTE_OPTIONS','Опции');
    define('FILTER_ADMIN_NOTE_OPEN','Открыть');
    
    define('FILTER_ADMIN_BUTTON_BACK','Вернуться к списку записей');
    define('FILTER_ADMIN_BUTTON_ADD_NEW','Добавить новую запись');
    define('FILTER_ADMIN_BUTTON_VIEW_ONLINE','Посмотреть на сайте');
    define('FILTER_ADMIN_BUTTON_SAVE','Сохранить');
    define('FILTER_ADMIN_BUTTON_DELETE','Удалить');
    define('FILTER_ADMIN_BUTTON_UP','Вверх');
    define('FILTER_ADMIN_BUTTON_DOWN','Вниз');  
}else{
	define('FILTER_ADMIN_MOD_NAME','Статті');
	
	define('FILTER_ADMIN_NOTE_SAVED','Дані збережені!');
	define('FILTER_ADMIN_NOTE_EDITOR_CAT','Редактор категорії');
	define('FILTER_ADMIN_NOTE_EDITOR','Редактор статті');
	define('FILTER_ADMIN_NOTE_EDIT','Редагувати');
	define('FILTER_ADMIN_NOTE_CAPTION','Назва');
	define('FILTER_ADMIN_NOTE_IMAGE','Зображення');
	define('FILTER_ADMIN_NOTE_IMAGE_SIZE','Розмір');
	define('FILTER_ADMIN_NOTE_ATTANTION_IMAGE_SIZE','Дуже великий розмір!');
	define('FILTER_ADMIN_NOTE_EDIT_IMAGE','Редагувати зображення');
	define('FILTER_ADMIN_NOTE_CATEGORY','Категорія');
	define('FILTER_ADMIN_NOTE_SELECT_CATEGORY','Оберіть категорію');
	define('FILTER_ADMIN_NOTE_SHORT_DESCRIPTION','Короткий опис');
	define('FILTER_ADMIN_NOTE_FULL_DESCRIPTION','Текст статті');
	define('FILTER_ADMIN_NOTE_SHOW','Видимість');
	define('FILTER_ADMIN_NOTE_SHOW_ONLINE','Показувати на сайті');
	define('FILTER_ADMIN_NOTE_SHOW_ALL','Показувати все');
	define('FILTER_ADMIN_NOTE_ATTANTION_DELETE','Ви впевнені що хочете видалити запис');
	define('FILTER_ADMIN_NOTE_MAIN_SECTION','Головна секція');
	define('FILTER_ADMIN_NOTE_SECTION','Секція');
	define('FILTER_ADMIN_NOTE_TAG_SECTION','Тег-секція');
	define('FILTER_ADMIN_NOTE_MENU_CATEGORY','Меню категорій');
	define('FILTER_ADMIN_NOTE_OPTIONS','Опції');
	define('FILTER_ADMIN_NOTE_OPEN','Відкрити');
	
	define('FILTER_ADMIN_BUTTON_BACK','Назад до списку записів');
	define('FILTER_ADMIN_BUTTON_ADD_NEW','Додати новий запис');
	define('FILTER_ADMIN_BUTTON_VIEW_ONLINE','Подивитися на сайті');
	define('FILTER_ADMIN_BUTTON_SAVE','Зберегти');
	define('FILTER_ADMIN_BUTTON_DELETE','Видалити');
	define('FILTER_ADMIN_BUTTON_UP','Вгору');
    define('FILTER_ADMIN_BUTTON_DOWN','Вниз');
}
?>
