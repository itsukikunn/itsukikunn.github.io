const searchInput = document.getElementById('search-input');
    searchInput.addEventListener('input', function() {
    const searchQuery = searchInput.value;
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'cart.php?search=' + encodeURIComponent(searchQuery) + '&ajax=true', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('cart-results').innerHTML = xhr.responseText;
            }
        };
    xhr.send();
});