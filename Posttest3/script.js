alert("selamat datang di website ini");

const darkModeButton = document.querySelector('.dark-mode .dark-btn');
const lightModeButton = document.querySelector('.light-mode .light-btn');
const darkModeDisplay = document.querySelector('.dark-mode');
const lightModeDisplay = document.querySelector('.light-mode');
const contents = document.querySelectorAll('.a-content, .b-content'); // Memperbaiki ini
const hamburger = document.getElementById('hamburger');
const navbarList = document.getElementById('navbar-list');

darkModeButton.addEventListener('click', () => {
    document.body.classList.add('dark-theme');
    darkModeDisplay.style.display = 'none';
    lightModeDisplay.style.display = 'block';
    contents.forEach(content => {
        content.style.backgroundColor = 'black';
    });
});

lightModeButton.addEventListener('click', () => {
    document.body.classList.remove('dark-theme');
    lightModeDisplay.style.display = 'none';
    darkModeDisplay.style.display = 'block';
    contents.forEach(content => {
        content.style.backgroundColor = 'white'; 
    });
});

hamburger.addEventListener('click', () => {
    navbarList.style.display = navbarList.style.display === 'flex' ? 'none' : 'flex'; 
});

const mediaQuery = window.matchMedia('(min-width: 640px)');

function handleMediaQuery(mediaQuery) {
    if (mediaQuery.matches) {
        navbarList.style.display = 'flex';
    } else {
        navbarList.style.display = 'none';
    }
}

mediaQuery.addEventListener('change', handleMediaQuery);
handleMediaQuery(mediaQuery);
