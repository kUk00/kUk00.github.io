// Получаем элементы списка
var dropdownMenu = document.getElementsByClassName("dropdown-menu")[0];
var dropdownItems = dropdownMenu.getElementsByTagName("a");

// Добавляем обработчик события клика на каждый элемент списка
for (var i = 0; i < dropdownItems.length; i++) {
    dropdownItems[i].addEventListener("click", function() {
        // Получаем значение элемента
        var selectedValue = this.innerHTML;

        // Отправляем значение в PHP через AJAX запрос
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                // Обработка успешного ответа от сервера
                console.log(xhr.responseText);
            }
        };
        xhr.open("POST", "engine.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("selectedValue=" + selectedValue);
    });
}