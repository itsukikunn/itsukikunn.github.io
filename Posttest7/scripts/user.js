const hamburger = document.getElementById('hamburger');
const navbarList = document.getElementById('navbar-list');
const logo = document.querySelector('.img-logo');

hamburger.addEventListener('click', function() {
    document.querySelector('.navbar-up').classList.toggle('active');

    if (navbarList.style.display === 'flex') {
        navbarList.style.display = 'none';
    } else {
        navbarList.style.display = 'flex';
    }
});

window.addEventListener('resize', function() {
  if (window.innerWidth > 768) {
      navbarList.style.display = 'flex';
  } else {
      if (!document.querySelector('.navbar-up').classList.contains('active')) {
          navbarList.style.display = 'none';
      }
  }
});

const darkBtn = document.querySelector('.dark-btn');
const lightBtn = document.querySelector('.light-btn');

darkBtn.addEventListener('click', function() {
    document.body.classList.add('dark-mode');
    document.body.classList.remove('light-mode');
    logo.src = 'Logo TP Inverse.png';
});

lightBtn.addEventListener('click', function() {
    document.body.classList.add('light-mode');
    document.body.classList.remove('dark-mode');
    logo.src = 'Logo TP.png';
});