document.addEventListener('DOMContentLoaded', function () {

    const menuButton = document.querySelector('.mobile-menu');
    const nav = document.querySelector('.nav-links');

    if (!menuButton || !nav) {
        return;
    }


    menuButton.addEventListener('click', function () {

        const isOpen =
            nav.classList.toggle('open');

        menuButton.setAttribute(
            'aria-expanded',
            String(isOpen)
        );

        document.body.classList.toggle(
            'menu-open',
            isOpen
        );

    });


    nav.querySelectorAll('a').forEach(function (link) {

        link.addEventListener('click', function () {

            nav.classList.remove('open');

            menuButton.setAttribute(
                'aria-expanded',
                'false'
            );

            document.body.classList.remove(
                'menu-open'
            );

        });

    });


    window.addEventListener('resize', function () {

        if (window.innerWidth > 760) {

            nav.classList.remove('open');

            menuButton.setAttribute(
                'aria-expanded',
                'false'
            );

            document.body.classList.remove(
                'menu-open'
            );

        }

    });


    /*
     * Small interaction for buttons/links.
     * No framework required.
     */

    document.querySelectorAll(
        'a[href^="#"]'
    ).forEach(function (link) {

        link.addEventListener('click', function (event) {

            const targetId =
                link.getAttribute('href');

            if (!targetId || targetId === '#') {
                return;
            }

            const target =
                document.querySelector(targetId);

            if (!target) {
                return;
            }

            event.preventDefault();

            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });

        });

    });

});