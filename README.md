 ### Жасалма интеллект аркылуу жумуш сунуштоо алгоритмы / IshTapp

- Колдонуучу көңүл бурган вакансиялардын негизинде кийинки жумуштарды сунуштоо ыкмасы.
- PHP технологиясы менен иштейт.
- Көчүрүп иштетүү үчүн: ```composer require IshTapp/recommendation```
[![](https://github.com/ksaidin/ishtapp/blob/main/recommend.png)](https://github.com/ksaidin/ishtapp)

 ### Жумуш сунуштоо алгоритмы
- Алгоритм колдонуучунун оңго солго свайп (лайк/дизлайк) кыймыл аракетин машыгуу базасы катары кабыл алат.


[![](https://github.com/ksaidin/ishtapp/blob/main/swipe.png)](https://github.com/ksaidin/ishtapp)

 ### Иштетүү үчүн
Composer менен баштоо
 1. Composer жүктөп иштет
 2. Көчүрүп иштетүү үчүн: ```composer require IshTapp/recommendation```
 3. PHP >= 7.0; 
 
 ```php
 //Кээ бир фреймворкторго керек болушу мүмкүн
 include __DIR__ ."/vendor/autoload.php";
 ```

### Машыктыруу жана жумуш сунуштоо 

```php
   use IshTapp\Recommend; 
   $client = new Recommend();
   $client->train_ranking($table,$user); 
   $client->train_euclidean($table,$user); 
   $client->train_slopeOne($table, $user); 
```
 
### Иш түзүмү
Структуранын негизинде константалардын ыйгарым аттары өзгөрүшү мүмкүн

- Документ: ```StandardKey.php```
```php
    const SCORE = 'score'; //score  
    const vacancy_id = 'vacancy_id'; //Foreign key
    const USER_ID = 'user_id'; //Foreign key 
```
### Мисалы
Алгоритмдин эң жөнөкөй мисалы
```php
  /**
     Example using "rating: left and right swipe"
     like: score = 1;  dislike: score = 0
  **/
   $table = [
        ['vacancy_id'=> 'A',
         'score'=> 1, 
         'user_id'=> 'Aibek'
        ],
        ['vacancy_id'=> 'B',
         'score'=> 1, 
         'user_id'=> 'Aibek'
        ],
        ['vacancy_id'=> 'A',
         'score'=> 1, 
         'user_id'=> 'Nurbek'
        ],
        ['vacancy_id'=> 'B',
         'score'=> 1, 
         'user_id'=> 'Nurbek'
        ],
        ['vacancy_id'=> 'C',
         'score'=> 1, 
         'user_id'=> 'Nurbek'
        ]
  ];
  use IshTapp\Recommend; // import class
  $client = new Recommend();
  print_r($client->ranking($table,"Aibek")); // result = ['C' => 2] 
  print_r($client->ranking($table,"Aibek",1)); // result = []; 
  
  print_r($client->euclidean($table,"Aibek")); // result = ['C' => 1]
  print_r($client->euclidean($table,"Aibek", 2)); // result = [] ;  
  
  print_r($client->slopeOne($table,'Aibek')); // result = ['C' => 1]
  print_r($client->slopeOne($table,'Aibek', 2)); // result = []
```
