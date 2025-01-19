# Используем официальный образ PHP с Apache
FROM php:7.4-apache

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Копируем содержимое текущей директории в контейнер
COPY . .
RUN chown -R www-data:www-data /var/www/html
# Настраиваем доступ к файлу (например, database.db)
# Создаем файл .htaccess для запрета доступа к файлу
RUN echo "RedirectMatch 403 ^/static/instance/database\.db$" > /var/www/html/.htaccess

# Убедитесь, что модуль mod_rewrite включен
RUN a2enmod rewrite

# Открываем порт 1664
EXPOSE 1664

# Изменяем конфигурацию Apache для прослушивания порта 3000
RUN echo "Listen 1664" >> /etc/apache2/ports.conf

# Запускаем Apache
CMD ["apache2-foreground"]
