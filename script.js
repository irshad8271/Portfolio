document.addEventListener('DOMContentLoaded', () => {
    const menuBtn = document.getElementById('menu-btn');
    const sideMenu = document.getElementById('side-menu');
    const closeBtn = document.getElementById('close-btn');
    const overlay = document.getElementById('menu-overlay');
    const links = sideMenu.querySelectorAll('a');

    function openMenu() {
        sideMenu.classList.add('open');
        overlay.classList.add('show');
        document.body.style.overflow = 'hidden';
    }
    function closeMenu() {
        sideMenu.classList.remove('open');
        overlay.classList.remove('show');
        document.body.style.overflow = '';
    }

    menuBtn.addEventListener('click', openMenu);
    closeBtn.addEventListener('click', closeMenu);
    overlay.addEventListener('click', closeMenu);
    links.forEach(link => link.addEventListener('click', closeMenu));
});