const ButtonOpen = document.querySelector('#ButtonOpen'),
    ButtonClose = document.querySelector('#ButtonClose'),
    Nav = document.querySelector('#Nav'),
    navMobileButton = document.getElementById('navMobileButton');

export default function () {
    if (ButtonOpen) {
        ButtonOpen.addEventListener('click', function () {
            Nav.classList.add('open')
        });

        ButtonClose.addEventListener('click', function () {
            Nav.classList.remove('open')
        });
    }

    if (navMobileButton) {
        navMobileButton.addEventListener('click', function () {
            document.querySelector('Header').classList.toggle('open');
        });
    }
}
