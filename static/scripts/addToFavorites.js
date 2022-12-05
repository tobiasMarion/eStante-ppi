const favoriteButtons = document.querySelectorAll("button.add-to-favorites")

function ajax(item, person) {
    const xhr = new XMLHttpRequest()
    const url = '../item/add_to_favorites.php'
    xhr.open('POST', url, true)
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xhr.send(`person=${person}&item=${item}`)
}

favoriteButtons.forEach(button => button.addEventListener("click", () => {
    const item = document.querySelector('input[name="item"]').value
    const person = document.querySelector('input[name="person"]').value

    ajax(item, person)

    if (button.innerHTML == "Remover dos Favoritos") {
        button.innerHTML = "Adicionar aos Favoritos"
    } else {
        button.innerHTML = "Remover dos Favoritos"
    }
}))