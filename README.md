## Практика по книге "Head First. Design Patterns"

Пет-проект для закрепления материала с использованием PHP 8.4+, вместо Java.

### Структура проекта
 - `composer.json` - используется исключительно для PSR-4 и установки php-cs-fixer, phpstan
 - `hfb` - примитивная точка входа через консоль (по типу `artisan` в Laravel, `bin/console` в Symfony)
 - `src/` - исходный код, разбитый на главы книги

### Запуск
- Установка зависимостей
```bash
composer install
# или
docker run --rm -v ./:/app compser install # я использую через официальный образ Docker
```
- Запуск через hfb файл
```bash
php hfb
# или
docker run --rm -v ./:/app php:8.4-cli php /app/hfb # я использую через официальный образ Docker
```

### Линтинг и статический анализ
- Php CS Fixer
```bash
composer lint
```
- PhpStan
```bash
composer analyse
```
