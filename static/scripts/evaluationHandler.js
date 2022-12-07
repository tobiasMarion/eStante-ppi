const starButtons = document.querySelectorAll('#evaluation button')
const formStars = document.querySelector('#evaluation')

function ajaxEvaluate(evaluation, item, person) {
    const xhr = new XMLHttpRequest()
    const url = '../item/evaluation.php'
    xhr.open('POST', url, true)
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText)
        }
    }
    xhr.send(`person=${person}&item=${item}&evaluation=${evaluation}`);
}

formStars.addEventListener('submit', e => {
    e.preventDefault()
})

starButtons.forEach(button => button.addEventListener('click', event => {
    const evaluation = event.target.dataset.value
    const item = document.querySelector('input[name="item"]').value
    const person = document.querySelector('input[name="person"]').value
    ajaxEvaluate(evaluation, item, person)

    for (let star = 0; star < 5; star++) {
        const img = starButtons[star].children[0]

        if (star < evaluation) {
            img.src = '../static/assets/icons/filled-star.svg'
        } else {
            img.src = '../static/assets/icons/unfilled-star.svg'
        }


    }

}))

