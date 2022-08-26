# laravel-api-model-server
Server side for pseudo-Eloquent models

# Пакет для работы с моделями
https://github.com/nikserg/laravel-api-model

Этот пакет работает с моделями и входящими параметрами сформированными из Builder https://github.com/nikserg/laravel-api-model

Необходимо подключить трейт в модели:
```
class User extends Model {
    use DBQuery;
    use Filters;
}
```

DBQuery - открывает новый query для модели, чтобы работать с фильтрами
Filters - формирует запрос из входящих параметров из https://github.com/nikserg/laravel-api-model

Использование:
```
(new User)
    ->appendQuery()
    ->setFilters($request->search)
    ->setSort($request->column, $request->direction)
    ->closeQueryPaginate($request->per_page);
```