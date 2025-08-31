## Практика по книге "Head First. Design Patterns"

Пет-проект для закрепления материала с использованием PHP 8.4+, вместо Java.

### Структура проекта
```
|-- src
    |-- Framework - ядро на базе компонента Symfony Console (используется примитивный Kernel без DI)
        |-- Command - классы-команды для запуска модулей
    |-- SimUDuck - модуль из главы 1.
|-- hfb - точка входа консольного приложения (по типу `artisan` в Laravel, `bin/console` в Symfony)
``` 

### Установка зависимостей
```bash
composer install
# или
docker run --rm -v ./:/app compser install # я использую через официальный образ Docker
```

### Базовая команда
```bash
php hfb [command]
# или
docker run --rm -v ./:/app php:8.4-cli php /app/hfb [command] # я использую через официальный образ Docker
```

### Команды
- `app:duck` - запуск модуля SimUDuck

### Линтинг и статический анализ
- Php CS Fixer
```bash
composer lint
```
- PhpStan
```bash
composer analyse
```
