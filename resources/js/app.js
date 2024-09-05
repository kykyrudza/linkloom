import './bootstrap';
import 'trix';
import 'trix/dist/trix.css';

document.addEventListener('DOMContentLoaded', function() {
    const emailElement = document.getElementById('email');
    const alertElement = document.getElementById('custom-alert');
    const closeButton = alertElement.querySelector('button');

    emailElement.addEventListener('click', function() {
        // Создаем временный элемент для копирования текста
        const tempInput = document.createElement('input');
        document.body.appendChild(tempInput);
        tempInput.value = emailElement.textContent.replace('e-mail: ', '');
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);

        // Показываем кастомное уведомление с анимацией
        alertElement.classList.remove('hidden');
        alertElement.classList.remove('opacity-0');
        alertElement.classList.add('opacity-100');

        // Автоматически скрываем уведомление через 3 секунды
        setTimeout(function() {
            alertElement.classList.remove('opacity-100');
            alertElement.classList.add('opacity-0');
            setTimeout(function() {
                alertElement.classList.add('hidden');
            }, 300);
        }, 3000);
    });

    closeButton.addEventListener('click', function() {
        alertElement.classList.remove('opacity-100');
        alertElement.classList.add('opacity-0');
        setTimeout(function() {
            alertElement.classList.add('hidden');
        }, 300); // Задержка скрытия после анимации
    });
});


