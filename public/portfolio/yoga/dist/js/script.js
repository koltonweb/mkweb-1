window.addEventListener('DOMContentLoaded', function () {

    'use strict';
    let tab = document.querySelectorAll('.info-header-tab'), // колекция кнопок навигации  
        info = document.querySelector('.info-header'), // блок содержащий кнопки навигации (колекцию)
        tabContent = document.querySelectorAll('.info-tabcontent'); // колекция блоков на которые ссылаются кнопки навигации

    function hideTabContent(a) {
        for (let i = a; i < tabContent.length; i++) {
            tabContent[i].classList.remove('show');
            tabContent[i].classList.add('hide');
        }
    }

    hideTabContent(1);

    function showTabContent(b) {
        if (tabContent[b].classList.contains('hide')) {
            tabContent[b].classList.remove('hide');
            tabContent[b].classList.add('show');
        }
    }

    info.addEventListener('click', function (event) {
        let target = event.target;
        if (target && target.classList.contains('info-header-tab')) {
            for (let i = 0; i < tab.length; i++) {
                if (target == tab[i]) {
                    hideTabContent(0);
                    showTabContent(i);
                }
            }
        }
    });


    let deadline = '2020-06-25';

    // Create function get time in milliseconds создаем функцию для получения времени в милисекундах 
    function getTimeRemaining(endtime) {
        let t = Date.parse(endtime) - Date.parse(new Date()); /* Get the difference between the current date and the deadline variable set  Получить разницу между текущей датой и установленным пределов переменной deadline*/
        let seconds = (Math.floor(t / 1000) % 60),
            /*  Extract each unit of time from the obtained difference. Из полученной разницы вычленяем каждую единицу времени */
            minutes = Math.floor((t / 1000 / 60) % 60),
            hours = Math.floor(t / 1000 / 60 / 60);

        return {
            /* The result of the function is returned as an object. Результат работы функции возвращаем в виде объекта */
            'total': t,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
        };

    }

    /* Create a clock setting function to retrieve time elements from the document. Создаём функцию установки часов для получения элементов времени из документа */
    function setClock(id, endtime) {
        let timer = document.getElementById(id),
            hours = timer.querySelector('.hours'),
            minutes = timer.querySelector('.minutes'),
            seconds = timer.querySelector('.seconds'),
            timInterval = setInterval(updateClock, 1000);

        /* Create a function to dynamically update the values ​​of page elements. Создайте функцию для динамического обновления значений элементов страницы */
        function updateClock() {
            let t = getTimeRemaining(endtime); /* here, the variable t refers to the topmost function and gets the object from the received units of time. здесь переменная t обращается к самой верхней функции и получает объект из полученных единиц времени  */
            hours.textContent = t.hours; /* here is the assignment of the values ​​of the obtained time units to the elements of the html document  здесь идет присваивание значений полученных временных единиц к элементам документа html */
            minutes.textContent = t.minutes;
            seconds.textContent = t.seconds;


            if (parseInt(seconds.textContent) < 10) {
                seconds.textContent = '0' + t.seconds;
            }

            if (parseInt(minutes.textContent) < 10) {
                minutes.textContent = '0' + t.minutes;
            }

            if (parseInt(hours.textContent) < 10) {
                hours.textContent = '0' + t.hours;
            }

            if (t.total <= 0) {
                clearInterval(timInterval);
            }
        }

    }

    setClock('timer', deadline);

    // Modal PopUp

    let more = document.querySelector('.more'),
        overlay = document.querySelector('.overlay'),
        close = document.querySelector('.popup-close');

    more.addEventListener('click', function () {
        overlay.style.display = 'block';
        this.classList.add('more-splash');
        document.body.style.overflow = 'hidden';
    });

    close.addEventListener('click', function () {
        overlay.style.display = 'none';
        more.classList.remove('more-splash');
        document.body.style.overflow = '';
    });

    // Слайдер


    let slideIndex = 1,
        slides = document.querySelectorAll('.slider-item'),
        prev = document.querySelector('.prev'),
        next = document.querySelector('.next'),
        dotsWrap = document.querySelector('.slider-dots'),
        dots = document.querySelectorAll('.dot');


    setInterval(shoIntervalSlide, 5000);

    showSlides(slideIndex);

    prev.addEventListener('click', () => {

        plusSlides(-1);
    });

    next.addEventListener('click', () => {
        plusSlides(1);
    });

    dotsWrap.addEventListener('click', (e) => {
        for (let i = 0; i < dots.length + 1; i++) {
            if (e.target.classList.contains('dot') && e.target == dots[i - 1]) {
                currentSlide(i);
            }
        }
    });

    function showSlides(n) {

        if (n > slides.length) {
            slideIndex = 1;
        }

        if (n < 1) {
            slideIndex = slides.length;
        }

        slides.forEach((item) => item.style.display = 'none');
        dots.forEach((item) => item.classList.remove('dot-active'));

        slides[slideIndex - 1].style.display = 'block';
        dots[slideIndex - 1].classList.add('dot-active');
    }

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function shoIntervalSlide() {

        if (slideIndex > slides.length) {
            slideIndex = 1;
        }

        showSlides(slideIndex);
        slideIndex++;
    }

});