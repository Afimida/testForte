<!-- Banner -->
<section id="banner">
    <div class="inner">
        <h1>Супер тест</h1>
        <p>Супер сайт <a target="_blank" href="https://templated.co/">TEMPLATED</a> чужой креативный шаблон.
        </p>
    </div>
    <video autoplay loop muted playsinline src="<?= (isset($content['mediaDir'])&&!empty($content['mediaDir'])) ? $content['mediaDir'] : '' ?>video/banner.mp4"></video>
</section>

<!-- Highlights -->
<section class="wrapper">
    <div class="inner">
        <header class="special">
            <h2>Чего тут есть</h2>
            <p>Технологии</p>
        </header>
        <div class="highlights">
            <section>
                <div class="content">
                    <header>
                        <a href="#" class="icon fa-vcard-o"><span class="label">Icon</span></a>
                        <h3>Composer</h3>
                    </header>
                    <p>Если лень писать велосипеды</p>
                </div>
            </section>
            <section>
                <div class="content">
                    <header>
                        <a href="#" class="icon fa-files-o"><span class="label">Icon</span></a>
                        <h3>Docker</h3>
                    </header>
                    <p>Инкапсулирует среду, там где это сейчас не надо</p>
                </div>
            </section>
            <section>
                <div class="content">
                    <header>
                        <a href="#" class="icon fa-floppy-o"><span class="label">Icon</span></a>
                        <h3>Docker-compose</h3>
                    </header>
                    <p>Облегчает работу с контейнерами, для лентяев.</p>
                </div>
            </section>
            <section>
                <div class="content">
                    <header>
                        <a href="#" class="icon fa-line-chart"><span class="label">Icon</span></a>
                        <h3>Mysql</h3>
                    </header>
                    <p>Старье для хранения данных</p>
                </div>
            </section>
            <section>
                <div class="content">
                    <header>
                        <a href="#" class="icon fa-paper-plane-o"><span class="label">Icon</span></a>
                        <h3>PHP Native</h3>
                    </header>
                    <p>Олдскульный безумец.</p>
                </div>
            </section>
            <section>
                <div class="content">
                    <header>
                        <a href="#" class="icon fa-qrcode"><span class="label">Icon</span></a>
                        <h3>Работаю на Linux</h3>
                    </header>
                    <p>Один клик кнопкой в винде ничто, тысяча команд в CMD все.</p>
                </div>
            </section>
        </div>
    </div>
</section>

<!-- CTA -->
<section id="cta" class="wrapper">
    <div class="inner">
        <h2>Работа со ставками</h2>
        <p>Внимание работает CRON</p>
        <h3>Что-то происходит и никто не знает что.</h3>
    </div>
</section>

<!-- Testimonials -->
<section class="wrapper">
    <div class="inner">
        <header class="special">
            <h2>Отзывы о тесте</h2>
            <p>Тысячи положительных откликов от разработчиков о новейшем тестовом задании</p>
        </header>
        <div class="testimonials">
            <section>
                <div class="content">
                    <blockquote>
                        <p>О ужас, что это за анти-паттерны?.</p>
                    </blockquote>
                    <div class="author">
                        <div class="image">
                            <img src="<?= (isset($content['mediaDir'])&&!empty($content['mediaDir'])) ? $content['mediaDir'] : '' ?>images/pic01.jpg" alt=""/>
                        </div>
                        <p class="credit">- <strong>Jane Doe</strong> <span>CEO - ABC Inc.</span></p>
                    </div>
                </div>
            </section>
            <section>
                <div class="content">
                    <blockquote>
                        <p>Как задрали эти говноделы.</p>
                    </blockquote>
                    <div class="author">
                        <div class="image">
                            <img src="<?= (isset($content['mediaDir'])&&!empty($content['mediaDir'])) ? $content['mediaDir'] : '' ?>images/pic03.jpg" alt=""/>
                        </div>
                        <p class="credit">- <strong>John Doe</strong> <span>CEO - ABC Inc.</span></p>
                    </div>
                </div>
            </section>
            <section>
                <div class="content">
                    <blockquote>
                        <p>Когда уже они перейдут на MariaDB или PostgreSQL.</p>
                    </blockquote>
                    <div class="author">
                        <div class="image">
                            <img src="<?= (isset($content['mediaDir'])&&!empty($content['mediaDir'])) ? $content['mediaDir'] : '' ?>images/pic02.jpg" alt=""/>
                        </div>
                        <p class="credit">- <strong>Janet Smith</strong> <span>CEO - ABC Inc.</span></p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>