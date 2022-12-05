const starButtons = document.querySelectorAll('#evaluation button')
const form = document.querySelector('#evaluation')

function ajax(evaluation, item, person) {
    const xhr = new XMLHttpRequest()
    const url = '../item/evaluation.php'
    xhr.open('POST', url, true)
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xhr.send(`person=${person}&item=${item}&evaluation=${evaluation}`);

}

starButtons.forEach((button, index) => button.addEventListener('click', event => {
    const evaluation = event.target.dataset.value
    const item = document.querySelector('input[name="item"]').value
    const person = document.querySelector('input[name="person"]').value
    ajax(evaluation, item, person)

    for (let star = 0; star < 5; star++) {
        const img = starButtons[star].children[0]

        if (star < evaluation) {
            img.src = '../static/assets/icons/filled-star.svg'
        } else {
            img.src = '../static/assets/icons/unfilled-star.svg'
        }

        
    }
    
}))

form.addEventListener('submit', e => {
    e.preventDefault()
})
