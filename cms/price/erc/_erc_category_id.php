<?	
			
            if($values[1] == "Аккумуляторы промышленные"){ // Сверка 2017.08.14
                if($values[2] == "Батареи AGM"){$category_id = "83";}//83
                else{$category_id = "372";}
            }  
            elseif($values[1] == "Аксессуары"){ // Сверка 2017.08.14
                if($values[2] == "Аккумуляторы и универсальные батареи"){$category_id = "64";} // 64
                elseif($values[2] == "Автотовары"){$category_id = "404";} 
                elseif($values[2] == "Батарейки"){$category_id = "65";} //65
                elseif($values[2] == "Док-станции и подставки"){$category_id = "66";} //66
                elseif($values[2] == "Зарядные устройства и адаптеры питания"){$category_id = "67";} 
                elseif($values[2] == "Защитные пленки"){$category_id = "68";}//68
                elseif($values[2] == "Защитные пленки и чистящие средства"){$category_id = "68";}//68
                elseif($values[2] == "Защитные стекла"){$category_id = "80";}
                elseif($values[2] == "Источники света, вспышки, фонари"){$category_id = "69";}//69
                elseif($values[2] == "Кабели, разветвители, переходники аудио-видео"){$category_id = "70";}//70
                elseif($values[2] == "Кабели, разветвители, переходники компьютерные"){$category_id = "71";}//71
                elseif($values[2] == "Стилусы"){$category_id = "82";}
		elseif($values[2] == "Сумки дорожные"){$category_id = "81";}//81
                elseif($values[2] == "Перчатки"){$category_id = "72";}//72
                elseif($values[2] == "Чехлы для жестких дисков"){$category_id = "73";}//73
                elseif($values[2] == "Чехлы для мобильных телефонов и MP3 плееров"){$category_id = "74";}//74
                elseif($values[2] == "Чехлы для планшетов"){$category_id = "75";}//75
                elseif($values[2] == "Чехлы, сумки, рюкзаки для нетбуков и планшетов"){$category_id = "76";}//76
                elseif($values[2] == "Чехлы, сумки, рюкзаки для ноутбуков"){$category_id = "77";}//77
                elseif($values[2] == "Чехлы, сумки, рюкзаки, боксы для фото-видео камер"){$category_id = "78";}//78
                elseif($values[2] == "Штативы и принадлежности"){$category_id = "79";}//79
		else{$category_id = "372";}
			}
            elseif($values[1] == "Акустика"){  // Сверка 2017.08.14
                if($values[2] == "Акустические Системы (колонки)"){$category_id = "298";} 
                elseif($values[2] == "Гарнитуры для мобильных устройств"){$category_id = "299";} 
                elseif($values[2] == "Гарнитуры для ПК"){$category_id = "300";} 
                elseif($values[2] == "Наушники вставные"){$category_id = "301";}
                else{$category_id = "372";}				
            }
// ************************************			
            elseif($values[1] == "Альтернативное электропитание"){ // Сверка 2017.08.14
                if($values[2] == "Инверторы и контроллеры"){$category_id = "303";}          
                elseif($values[2] == "Солнечные панели"){$category_id = "304";} 
                else{$category_id = "372";}				
            }
            elseif($values[1] == "АТС и Системные телефоны"){    // Сверка 2017.08.14
                if($values[2] == "АТС: Базовые блоки"){$category_id = "104";}
                elseif($values[2] == "АТС: Принадлежности"){$category_id = "105";}
                elseif($values[2] == "АТС: Системные телефоны"){$category_id = "106";}
                elseif($values[2] == "Видеотерминалы"){$category_id = "107";}
                elseif($values[2] == "Дистрибутивы и документация: Приложения"){$category_id = "108";}
                elseif($values[2] == "Корпоративные лицензии: Серверные продукты"){$category_id = "109";}
                elseif($values[2] == "Опции"){$category_id = "110";}
                elseif($values[2] == "Серверы видеоконференцсвязи"){$category_id = "111";}
                elseif($values[2] == "Телефоны проводные"){$category_id = "206";}
		else{$category_id = "372";}
            }
            elseif($values[1] == "Аудио для мобильных устройств"){    // Сверка 2017.08.14
                if($values[2] == "Гарнитуры для мобильных устройств"){$category_id = "299";} 
		elseif($values[2] == "Наушники вставные"){$category_id = "301";}
		elseif($values[2] == "Наушники накладные"){$category_id = "305";}
		elseif($values[2] == "Портативное радио"){$category_id = "306";}
		elseif($values[2] == "Портативные акустические системы"){$category_id = "307";}
		elseif($values[2] == "Радио часы"){$category_id = "308";}
		elseif($values[2] == "Стационарные акустические системы"){$category_id = "309";}
		else{$category_id = "372";}
            }
            elseif($values[1] == "Аудио/Видео системы"){ // Сверка 2017.08.14
                if($values[2] == "Домашние кинотеатры, саундбары"){$category_id = "311";}            
                elseif($values[2] == "Музыкальные центры, плееры"){$category_id = "312";}            
                elseif($values[2] == "Опции"){$category_id = "313";}
                else{$category_id = "372";}				
            }
elseif($values[1] == "Безопасность и Управление Домом"){ // Сверка 2017.08.14
                unset($values);				
            }            
            elseif($values[1] == "Бытовая техника крупная"){  // Сверка 2017.08.14
                if($values[2] == "Аксессуары и расходники"){$category_id = "314";}
                elseif($values[2] == "Бытовая химия"){$category_id = "315";}
                elseif($values[2] == "Микроволновые печи"){$category_id = "95";}
                elseif($values[2] == "Морозильники"){$category_id = "89";}
                elseif($values[2] == "Плиты"){$category_id = "90";}
                elseif($values[2] == "Посудомоечные машины"){$category_id = "91";}
                elseif($values[2] == "Стиральные машины"){$category_id = "92";}
                elseif($values[2] == "Сушильные машины"){$category_id = "405";}
                elseif($values[2] == "Холодильники"){$category_id = "93";}
                elseif($values[2] == "Центрифуги"){$category_id = "316";}
		else{$category_id = "372";}
            }
            elseif($values[1] == "Бытовая техника мелкая"){   // Сверка 2017.08.14
                if($values[2] == "Аксессуары и расходники"){$category_id = "317";}
		elseif($values[2] == "Кофеварки"){$category_id = "94";}
                elseif($values[2] == "Микроволновые печи"){$category_id = "95";}
                elseif($values[2] == "Пылесосы"){$category_id = "96";}
                elseif($values[2] == "Тостеры"){$category_id = "97";}
                elseif($values[2] == "Утюги"){$category_id = "98";}
                elseif($values[2] == "Чайники"){$category_id = "99";}
		else{$category_id = "372";}
            }
            elseif($values[1] == "Встраиваемая техника"){   // Сверка 2017.08.14
                if($values[2] == "Варочные поверхности"){$category_id = "100";}
                elseif($values[2] == "Встраиваемые  холодильники"){$category_id = "318";}
                elseif($values[2] == "Встраиваемые духовки"){$category_id = "101";}
                elseif($values[2] == "Встраиваемые микроволновые печи"){$category_id = "319";}
                elseif($values[2] == "Встраиваемые посудомоечные машины"){$category_id = "102";}
                elseif($values[2] == "Встраиваемые стиральные машины"){$category_id = "320";}
                elseif($values[2] == "Вытяжки"){$category_id = "103";}
		else{$category_id = "372";}
            }
elseif($values[1] == "Дом и Сад"){
                unset($values);            
            }
            elseif($values[1] == "Инструменты"){   // Сверка 2017.08.14
                if($values[2] == "Бороздоделы( штроборезы)"){$category_id = "321";}            
                elseif($values[2] == "Дрели и миксеры"){$category_id = "322";}            
                elseif($values[2] == "Измерительная техника"){$category_id = "323";}            
                elseif($values[2] == "Клеевые пистолеты и аксессуары"){$category_id = "324";} 
                elseif($values[2] == "Краскопульты"){$category_id = "407";}           
                elseif($values[2] == "Многофункциональные инструменты"){$category_id = "325";}            
                elseif($values[2] == "Ножницы"){$category_id = "326";}            
                elseif($values[2] == "Отбойные молотки"){$category_id = "327";}            
                elseif($values[2] == "Перфораторы"){$category_id = "328";}            
                elseif($values[2] == "Пилы и плиткорезы"){$category_id = "329";}            
                elseif($values[2] == "Расходные материалы"){$category_id = "330";}            
                elseif($values[2] == "Скобозабиватели"){$category_id = "331";}  
                elseif($values[2] == "Столы, стойки, насадки"){$category_id = "409";}          
                elseif($values[2] == "Строительные фены и пылесосы"){$category_id = "332";}            
                elseif($values[2] == "Точильный инструмент"){$category_id = "333";}            
                elseif($values[2] == "Фрезеры"){$category_id = "334";}            
                elseif($values[2] == "Шлифовальные и полировалные машинки( Болгарки)"){$category_id = "335";}            
                elseif($values[2] == "Шуроповерты и электроотвертки"){$category_id = "336";}            
                elseif($values[2] == "Электролобзики"){$category_id = "337";}            
                elseif($values[2] == "Электрорубанки"){$category_id = "338";}
                elseif($values[2] == "Ящики и сумки для инструментов"){$category_id = "408";}
                else{$category_id = "372";}				
            }
            elseif($values[1] == "Источники и системы бесперебойного питания"){     // Сверка 2017.08.14
                if($values[2] == "Батареи дополнительные"){$category_id = "112";}
                elseif($values[2] == "Батареи заменяемые"){$category_id = "113";}
                elseif($values[2] == "ИБП бытовые и компьютеров"){$category_id = "339";}
                elseif($values[2] == "ИБП компьютеров"){$category_id = "114";}
                elseif($values[2] == "ИБП серверов"){$category_id = "115";}
                elseif($values[2] == "ИБП центров информации"){$category_id = "116";}
                elseif($values[2] == "Коммуникационные шкафы и опции к ним"){$category_id = "267";}
                elseif($values[2] == "Опции"){$category_id = "266";}
                elseif($values[2] == "Системы ИБП постоянного тока"){$category_id = "340";}
                elseif($values[2] == "Системы охлаждения и кондиционирования"){$category_id = "268";}
                elseif($values[2] == "Фильтры и стабилизаторы"){$category_id = "269";}
                elseif($values[2] == "Фотоэлектрические системы"){$category_id = "341";}
		else{$category_id = "372";}
            }
            elseif($values[1] == "Климатическая техника"){    // Сверка 2017.08.14
                if($values[2] == "Вентиляторы"){$category_id = "117";}
                elseif($values[2] == "Водонагреватели"){$category_id = "118";}
                elseif($values[2] == "Конвекторы"){$category_id = "119";}
                elseif($values[2] == "Кондиционеры"){$category_id = "120";}
                elseif($values[2] == "Обогреватели"){$category_id = "121";}
                elseif($values[2] == "Очистители воздуха"){$category_id = "122";}
                elseif($values[2] == "Расходные материалы"){$category_id = "410";}
                elseif($values[2] == "Увлажнители воздуха"){$category_id = "123";}
		else{$category_id = "372";}
            }
            elseif($values[1] == "Компьютерная периферия"){  // Сверка 2017.08.14
                if($values[2] == "Веб-камеры"){$category_id = "124";}
                elseif($values[2] == "Графические планшеты"){$category_id = "125";}
                elseif($values[2] == "Кардридеры"){$category_id = "126";}
                elseif($values[2] == "Клавиатуры беспроводные"){$category_id = "342";}
                elseif($values[2] == "Клавиатуры проводные"){$category_id = "343";}
                elseif($values[2] == "Клавиатуры"  && $values[0] == "Apple CPU"){$category_id = "138";}
                elseif($values[2] == "Клавиатуры"){$category_id = "127";}
                elseif($values[2] == "Клавиатуры к планшетам"){$category_id = "128";}
                elseif($values[2] == "Коврики для мышей"){$category_id = "129";}
                elseif($values[2] == "Комплекты беспроводные (клавиатура + мышь)"){$category_id = "130";}
                elseif($values[2] == "Комплекты проводные (клавиатура + мышь)"){$category_id = "131";}
                elseif($values[2] == "Манипуляторы игровые"){$category_id = "132";}
                elseif($values[2] == "Мыши беспроводные"  && $values[0] == "Apple CPU"){$category_id = "139";}
                elseif($values[2] == "Мыши беспроводные"){$category_id = "133";}
                elseif($values[2] == "Мыши проводные"  && $values[0] == "Apple CPU"){$category_id = "140";}
                elseif($values[2] == "Мыши проводные"){$category_id = "134";}
                elseif($values[2] == "Опции"  && $values[0] == "Apple CPU"){$category_id = "141";}
                elseif($values[2] == "Опции"){$category_id = "135";}
                elseif($values[2] == "Презенторы"){$category_id = "136";}
                elseif($values[2] == "Системы для видеоконференцсвязи"){$category_id = "344";}
		else{$category_id = "372";}
            }
            elseif($values[1] == "Компьютерные компоненты"){  // Сверка 2017.08.14
                if($values[2] == "Блоки питания"){$category_id = "346";}           
                elseif($values[2] == "Видеокарты"){$category_id = "347";}           
                elseif($values[2] == "Звуковые карты"){$category_id = "348";}           
                elseif($values[2] == "Кабели, удлинители, адаптеры, переходники"){$category_id = "349";}
                elseif($values[2] == "Кардридеры и дисководы"){$category_id = "411";}           
                elseif($values[2] == "Корпуса к ПК"){$category_id = "350";}           
                elseif($values[2] == "Кулеры и радиаторы"){$category_id = "351";}           
                elseif($values[2] == "Материнские платы"){$category_id = "352";}           
                elseif($values[2] == "Опции"){$category_id = "353";}           
                elseif($values[2] == "Память DDR для ноутбуков"){$category_id = "354";}           
                elseif($values[2] == "Память DDR для ПК"){$category_id = "355";}           
                elseif($values[2] == "Память DDR для серверов"){$category_id = "356";}           
                elseif($values[2] == "Процессоры"){$category_id = "357";} 
                else{$category_id = "372";}				
            }
            elseif($values[1] == "Компьютеры"){    // Сверка 2017.08.14
                if($values[2] == "Компьютеры Бизнес"){$category_id = "22";}
                elseif($values[2] == "Компьютеры Потребительские" && $values[0] == "Apple CPU"){$category_id = "144";}
                elseif($values[2] == "Компьютеры Потребительские"){$category_id = "23";}
                elseif($values[2] == "Моноблоки" && $values[0] == "Apple CPU"){$category_id = "142";}
                elseif($values[2] == "Моноблоки"){$category_id = "24";}
                elseif($values[2] == "Графические рабочие станции" && $values[0] == "Apple CPU"){$category_id = "143";}
                elseif($values[2] == "Графические рабочие станции"){$category_id = "25";}
                elseif($values[2] == "Опции"){$category_id = "31";}
                elseif($values[2] == "Тонкие клиенты"){$category_id = "26";}
		else{$category_id = "372";}
            }
elseif($values[1] == "Кухонная посуда"){
                unset($values);            
            }
elseif($values[1] == "Кухонные аксессуары"){
                unset($values);            
            }
elseif($values[1] == "Кухонные ножи и принадлежности"){
                unset($values);            
            }
elseif($values[1] == "Лампы"){
                unset($values);            
            }
            elseif($values[1] == "Мобильная связь"){   // Сверка 2017.08.14
                if($values[2] == "Мобильные телефоны"){$category_id = "145";}
                elseif($values[2] == "Очки виртуальной реальности"){$category_id = "412";}
                elseif($values[2] == "Смарт-часы"){$category_id = "358";}
                elseif($values[2] == "СМАРТФОНЫ"){$category_id = "146";}
		else{$category_id = "372";}
            }
            elseif($values[1] == "Мониторы"){   // Сверка 2017.08.14
                if($values[2] == "Мониторы" && $values[0] == "Apple CPU"){$category_id = "148";}
// elseif($values[2] == "Мониторы"){$category_id = "monitors";}
                elseif($values[2] == "Мониторы с ТВ-тюнером (MFM)"){$category_id = "149";}
                elseif($values[2] == "Опции"){$category_id = "413";}
		else{$category_id = "372";}

            }
            elseif($values[1] == "Накопители и Flash память"){   // Сверка 2017.08.14
                if($values[2] == "Карманы для жестких дисков"){$category_id = "150";}
                elseif($values[2] == "Карты памяти CompactFlash"){$category_id = "359";}
                elseif($values[2] == "Карты памяти Flash"){$category_id = "151";}
                elseif($values[2] == "Карты памяти MicroSD"){$category_id = "360";}
                elseif($values[2] == "Карты памяти SD"){$category_id = "361";}
                elseif($values[2] == "Накопители оптические"){$category_id = "158";}
		elseif($values[2] == "Накопители HDD внешние"){$category_id = "152";}
                elseif($values[2] == "Накопители HDD для компьютеров"){$category_id = "153";}
                elseif($values[2] == "Накопители HDD для ноутбуков"){$category_id = "154";}
                elseif($values[2] == "Накопители HDD для серверов"){$category_id = "155";}
                elseif($values[2] == "Накопители HDD портативные"){$category_id = "156";}
                elseif($values[2] == "Накопители SSD"){$category_id = "157";}
                elseif($values[2] == "Накопители USB"){$category_id = "159";}
                elseif($values[2] == "Промышленные решения"){$category_id = "362";}
                elseif($values[2] == "Решения для Apple"){$category_id = "363";}
		else{$category_id = "372";}
                
            }
            elseif($values[1] == "Ноутбуки"){    // Сверка 2017.08.14
                if($values[2] == "Нетбуки"){$category_id = "160";}
                elseif($values[2] == "Ноутбуки Бизнес"){$category_id = "161";}
                elseif($values[2] == "Ноутбуки Потребительские"){$category_id = "162";}
                elseif($values[2] == "MacBook"){$category_id = "414";}
                elseif($values[2] == "MacBook Air"){$category_id = "163";}
                elseif($values[2] == "MacBook Pro"){$category_id = "164";}
                elseif($values[2] == "Опции"){$category_id = "165";}
		else{$category_id = "372";}
            }
			
elseif($values[1] == "Оптические приборы"){
                unset($values);            
            }
elseif($values[1] == "Офисное и кассовое оборудование"){
                unset($values);            
            }

            elseif($values[1] == "Пассивное сетевое оборудование"){   // Сверка 2017.08.14
                if($values[2] == "Инструменты"){$category_id = "196";}
                elseif($values[2] == "Кабель медный и патч-корды (витая пара, телефонный)"){$category_id = "197";}
                elseif($values[2] == "Оптические компоненты СКС"){$category_id = "198";}
                elseif($values[2] == "Опции"){$category_id = "199";}
                elseif($values[2] == "Пассивные сетевые компоненты, системы прокладки и крепеж"){$category_id = "200";}
                elseif($values[2] == "Системы распределения питания PDU"){$category_id = "201";}
                elseif($values[2] == "Скотчи и монтажные ленты"){$category_id = "365";}
                elseif($values[2] == "Телекоммуникационные стойки"){$category_id = "202";}
                elseif($values[2] == "Телекоммуникационные шкафы"){$category_id = "366";}
		else{$category_id = "372";}
            }

            elseif($values[1] == "Планшеты"){   // Сверка 2017.08.14
                if($values[2] == "Планшеты"){$category_id = "167";}
                elseif($values[2] == "iPad 2"){$category_id = "166";}
                elseif($values[2] == "iPad 3"){$category_id = "168";}
                elseif($values[2] == "iPad 4"){$category_id = "169";}
                elseif($values[2] == "iPad (5 Gen)"){$category_id = "415";}
                elseif($values[2] == "iPad Pro"){$category_id = "419";}
                elseif($values[2] == "iPad Pro 9.7"){$category_id = "420";}
                elseif($values[2] == "iPad mini"){$category_id = "170";}
                elseif($values[2] == "iPad mini 2"){$category_id = "417";}
                elseif($values[2] == "iPad mini 4"){$category_id = "418";}
                elseif($values[2] == "iPad mini  Retina"){$category_id = "171";}
                elseif($values[2] == "iPad Air"){$category_id = "172";}
                elseif($values[2] == "iPad Air 2"){$category_id = "416";}
		else{$category_id = "372";}
            }

elseif($values[1] == "Посуда для сервировки"){
                unset($values);            
            }
            elseif($values[1] == "Программное обеспечение"){    // Сверка 2017.08.14
                if($values[2] == "Коробочное ПО: Приложения" && $values[0] == "Apple CPU"){$category_id = "181";}
                elseif($values[2] == "Коробочное ПО: Приложения"){$category_id = "173";}
                elseif($values[2] == "Коробочное ПО: Операционные системы"){$category_id = "174";}
                elseif($values[2] == "Коробочное ПО: Серверные продукты"){$category_id = "175";}
                elseif($values[2] == "Продукты OEM: Операционные системы"){$category_id = "176";}
                elseif($values[2] == "Продукты OEM: Серверные продукты"){$category_id = "177";}
                elseif($values[2] == "Дистрибутивы и документация: Серверные продукты"){$category_id = "178";}
                elseif($values[2] == "Дистрибутивы и документация: Приложения"){$category_id = "179";}
		else{$category_id = "372";}
            }
            elseif($values[1] == "Программное обеспечение: Корпоративные лицензии"){   // Сверка 2017,01,21
                $category_id = "182";
            }

            elseif($values[1] == "Проекционное оборудование"){   // Сверка 2017.08.14
                if($values[2] == "Крепления для проекторов"){$category_id = "239";}
                elseif($values[2] == "Лампы для проекторов"){$category_id = "421";}
                elseif($values[2] == "Опции"){$category_id = "240";}
                elseif($values[2] == "Проекторы"){$category_id = "242";}
                elseif($values[2] == "Проекционные экраны"){$category_id = "243";}
                elseif($values[2] == "Сменнная оптика для проекторов"){$category_id = "422";}
		else{$category_id = "372";}            
            }


           elseif($values[1] == "Расходные материалы"){    // Сверка 2017.08.14
                if($values[2] == "Бумага для принтеров" || $values[2] == "Бумага офисная"){$category_id = "183";}
                elseif($values[2] == "Бумага и носители специализированные"){$category_id = "184";}
                elseif($values[2] == "Бумага широкоформатная"){$category_id = "185";}
                elseif($values[2] == "Картриджи для копиров"){$category_id = "186";}
                elseif($values[2] == "Картриджи для ленточных накопителей"){$category_id = "187";}
                elseif($values[2] == "Картриджи для специализированных принтеров"){$category_id = "188";}
                elseif($values[2] == "Картриджи для факсов"){$category_id = "189";}
                elseif($values[2] == "Картриджи лазерные монохромные"){$category_id = "190";}
                elseif($values[2] == "Картриджи лазерные цветные"){$category_id = "191";}
                elseif($values[2] == "Картриджи матричные"){$category_id = "192";}
                elseif($values[2] == "Картриджи струйные"){$category_id = "193";}
                elseif($values[2] == "Картриджи струйные для широкоформатных устройств"){$category_id = "194";}
                elseif($values[2] == "Ресурсные узлы и материалы"){$category_id = "195";}
		else{$category_id = "372";}
            }
 
elseif($values[1] == "Рекламные материалы"){
                unset($values);            
            }
elseif($values[1] == "Светильники потребительские"){
                unset($values);            
            }
elseif($values[1] == "Серверы"){
                unset($values);            
            }
			
            elseif($values[1] == "Сетевое оборудование"){    // Сверка 2017.08.14
                if($values[2] == "Антенны"){$category_id = "275";}
                elseif($values[2] == "IP-видеорегистраторы"){$category_id = "270";}
                elseif($values[2] == "IP-камеры"){$category_id = "271";}
                elseif($values[2] == "IP-камеры корпусные"){$category_id = "272";}
                elseif($values[2] == "IP-камеры купольные фиксированные"){$category_id = "273";}
                elseif($values[2] == "IP-камеры роботизированные"){$category_id = "274";}
                elseif($values[2] == "Беспроводное оборудование"){$category_id = "276";}
                elseif($values[2] == "Беспроводное оборудование Aruba"){$category_id = "276";}
                elseif($values[2] == "Интернет-шлюзы"){$category_id = "277";}
                elseif($values[2] == "Кабели, удлинители, адаптеры, переходники"){$category_id = "278";}
                elseif($values[2] == "Коммутаторы"){$category_id = "279";}
                elseif($values[2] == "Коммутаторы настраиваемые (Smart)"){$category_id = "280";}
                elseif($values[2] == "Коммутаторы неуправляемые"){$category_id = "281";}
                elseif($values[2] == "Коммутаторы управляемые"){$category_id = "282";}
                elseif($values[2] == "Маршрутизаторы"){$category_id = "283";}
                elseif($values[2] == "Медиаконвертеры"){$category_id = "284";}
                elseif($values[2] == "Модемы"){$category_id = "285";}
                elseif($values[2] == "Модули для коммутаторов"){$category_id = "286";}
                elseif($values[2] == "Модули для маршрутизаторов"){$category_id = "287";}
                elseif($values[2] == "Опции"){$category_id = "288";}
                elseif($values[2] == "Переключатели-KVM, Разветвители, Переходники"){$category_id = "289";}
                elseif($values[2] == "Принт-серверы"){$category_id = "290";}
                elseif($values[2] == "Продукты VoIP"){$category_id = "291";}
                elseif($values[2] == "Продукты xDSL"){$category_id = "292";}
                elseif($values[2] == "Расширение гарантии"){$category_id = "293";}
                elseif($values[2] == "Сетевые карты"){$category_id = "294";}
                elseif($values[2] == "Устройства Ethernet-to-Powerline"){$category_id = "295";}
                elseif($values[2] == "Устройства сетевой безопасности"){$category_id = "296";}
		else{$category_id = "372";}
            }
            elseif($values[1] == "Системы отображения информации"){   // Сверка 2017.08.14
                if($values[2] == "Информационные дисплеи"){$category_id = "236";}
                elseif($values[2] == "Крепления для мониторов, ТВ и панелей"){$category_id = "238";}
                elseif($values[2] == "Опции"){$category_id = "240";}
                elseif($values[2] == "Плееры Blu-ray,DVD,CD"){$category_id = "241";}
                else{$category_id = "372";}
            }
			
elseif($values[1] == "Системы хранения данных"){
                unset($values);            
            }
elseif($values[1] == "Средства индивидуальной защиты"){
                unset($values);            
            }
elseif($values[1] == "Строительное оборудование и спецтехника"){
                unset($values);            
            }
		
            elseif($values[1] == "Телевизоры"){   // Сверка 2017.08.14
                if($values[2] == "Опции для телевизоров"){$category_id = "203";}
                elseif($values[2] == "Карты доступа"){$category_id = "203";}
                elseif($values[2] == "Телевизоры"){$category_id = "204";}
		else{$category_id = "372";}
            }
            elseif($values[1] == "Телефоны и Факсы"){    // Сверка 2017.08.14
                if($values[2] == "Телефоны беспроводные"){$category_id = "205";}
                elseif($values[2] == "Телефоны проводные"){$category_id = "206";}
                elseif($values[2] == "Факсы"){$category_id = "207";}
		else{$category_id = "372";}
            }
			
            elseif($values[1] == "Техника для кухни"){   // Сверка 2017.08.14
                if($values[2] == "Блендеры"){$category_id = "208";}
                elseif($values[2] == "Весы"){$category_id = "209";}
                elseif($values[2] == "Весы кухонные"){$category_id = "209";}
                elseif($values[2] == "Кофеварки"){$category_id = "423";}
                elseif($values[2] == "Кухонные комбайны"){$category_id = "210";}
                elseif($values[2] == "Миксеры"){$category_id = "211";}
                elseif($values[2] == "Мороженицы, йогуртницы"){$category_id = "212";}
                elseif($values[2] == "Мультиварки,Пароварки, Фритюрницы"){$category_id = "213";}
                elseif($values[2] == "Мясорубки"){$category_id = "214";}
                elseif($values[2] == "Соковыжималки"){$category_id = "215";}
                elseif($values[2] == "Сушка для продуктов"){$category_id = "425";}
                elseif($values[2] == "Тостеры"){$category_id = "424";}
                elseif($values[2] == "Хлебопечи"){$category_id = "216";}
                elseif($values[2] == "Электрические термопоты"){$category_id = "217";}
                elseif($values[2] == "Электропечи и грили"){$category_id = "218";}
                elseif($values[2] == "Электрочайники"){$category_id = "219";}
		else{$category_id = "372";}
            }
			
            elseif($values[1] == "Техника для личного пользования"){   // Сверка 2017.08.14
                if($values[2] == "Аксессуары и расходники"){$category_id = "427";}
                elseif($values[2] == "Весы напольные"){$category_id = "220";}
                elseif($values[2] == "Домашняя терапия"){$category_id = "221";}
                elseif($values[2] == "Зубные щетки"){$category_id = "428";}
                elseif($values[2] == "Машинки для стрижки"){$category_id = "222";}
                elseif($values[2] == "Товары для здоровья"){$category_id = "223";}
                elseif($values[2] == "Фены"){$category_id = "224";}
                elseif($values[2] == "Швейные машинки"){$category_id = "426";}
                elseif($values[2] == "Щипцы для укладки волос"){$category_id = "225";}
                elseif($values[2] == "Электрические бритвы"){$category_id = "226";}
                elseif($values[2] == "Электронная косметика"){$category_id = "227";}
                elseif($values[2] == "Эпиляторы"){$category_id = "228";}
		else{$category_id = "372";}
            }
			
elseif($values[1] == "Товары для автомобиля"){
                unset($values);            
            }
    
elseif($values[1] == "Товары для детей. Гигиена"){
                unset($values);            
            } 

elseif($values[1] == "Товары для детей. Для самых маленьких"){
                unset($values);            
            } 
            
elseif($values[1] == "Товары для детей. Игрушки"){
                unset($values);            
            } 
            
elseif($values[1] == "Товары для детей. Конструкторы"){
                unset($values);            
            }  
            
elseif($values[1] == "Товары для детей. Мебель"){
                unset($values);            
            }                                               

elseif($values[1] == "Товары для детей. Транспорт"){
                unset($values);            
            }

            elseif($values[1] == "Устройства печати и сканирования"){   // Сверка 2017.08.14
                if($values[2] == "Многофункциональные струйные устройства"){$category_id = "253";}
                elseif($values[2] == "Многофункциональные лазерные устройства"){$category_id = "254";}
                elseif($values[2] == "Принтеры 3D"){$category_id = "429";}
                elseif($values[2] == "Принтеры лазерные цветные"){$category_id = "255";}
                elseif($values[2] == "Принтеры лазерные монохромные"){$category_id = "256";}
                elseif($values[2] == "Принтеры струйные"){$category_id = "257";}
                elseif($values[2] == "Принтеры матричные"){$category_id = "258";}
                elseif($values[2] == "Принтеры специализированные"){$category_id = "259";}
                elseif($values[2] == "Ручки 3D"){$category_id = "430";}
                elseif($values[2] == "Широкоформатные струйные устройства"){$category_id = "260";}
                elseif($values[2] == "Широкоформатные лазерные устройства"){$category_id = "261";}
                elseif($values[2] == "Многофункциональные копировальные аппараты"){$category_id = "2";}
                elseif($values[2] == "Опции"){$category_id = "262";}
                elseif($values[2] == "Сканеры 3D"){$category_id = "431";}
                elseif($values[2] == "Сканеры"){$category_id = "263";}
                elseif($values[2] == "Сканеры документные"){$category_id = "264";}
                elseif($values[2] == "Сканеры широкоформатные"){$category_id = "265";}
		else{$category_id = "372";}
            }
			
            elseif($values[1] == "Фото-видео устройства"){   // Сверка 2017,01,21
                if($values[2] == "Видеорегистраторы"){$category_id = "229";}
                elseif($values[2] == "Объективы и фильтры к цифровым камерам"){$category_id = "230";}
                elseif($values[2] == "Опции"){$category_id = "231";}
                elseif($values[2] == "Светофильтры"){$category_id = "232";}
                elseif($values[2] == "Цифровые видеокамеры"){$category_id = "233";}
                elseif($values[2] == "Цифровые камеры со сменной оптикой"){$category_id = "234";}
                elseif($values[2] == "Цифровые фотокамеры"){$category_id = "235";}
		else{$category_id = "372";}
            }

elseif($values[1] == "Хранение и упаковка"){
                unset($values);            
            }

            elseif($values[1] == "Цифровые персональные устройства"){   // Сверка 2017,01,21
                if($values[2] == "GPS навигаторы и карты"){$category_id = "245";}
                elseif($values[2] == "MP3 плееры"){$category_id = "246";}
                elseif($values[2] == "Кабели, удлинители, адаптеры, переходники"){$category_id = "247";}
                elseif($values[2] == "Медиаплееры и ТВ-приставки"){$category_id = "248";}
                elseif($values[2] == "Опции"){$category_id = "249";}
                elseif($values[2] == "Спортивные часы"){$category_id = "250";}
                elseif($values[2] == "Цифровые фоторамки и фотоальбомы"){$category_id = "251";}
                elseif($values[2] == "Эхолоты"){$category_id = "252";}
		else{$category_id = "372";}
            }

elseif($values[1] == "Электромонтажное оборудование"){
                unset($values);            
            }
            
elseif($values[1] == "Электронные книги"){
                unset($values);            
            }
            
elseif($values[1] == "Электротранспорт"){
                unset($values);            
            }
            
elseif($values[1] == "IT Аудио"){
                unset($values);
            }

            else{
				$category_id = "";
                unset($values);
            }
?>
