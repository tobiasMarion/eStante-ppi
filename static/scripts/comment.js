const commentForm = document.querySelector(".send-comment")
const label = document.querySelector('.name-label')
const initialLabel = label.innerHTML
const replyButtons = document.querySelectorAll(".reply-button")

function ajaxComment(person, replyTo, content, item) {
    const xhr = new XMLHttpRequest()
    const url = './comment.php'
    xhr.open('POST', url, true)
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText)
        }
    }
    xhr.send(`item=${item}&person=${person}&content=${content}&reply-to=${replyTo}`)
    alert('Seu comentário foi enviado para revisão')
}

commentForm.addEventListener('submit', event => {
    event.preventDefault()

    const person = document.querySelector('input[name="person"]').value
    const replyTo = document.querySelector('input[name="reply-to"]').value
    const contentTextArea = document.querySelector('textarea[name="comment"]')
    const content = contentTextArea.value
    const item = document.querySelector('input[name="item-id"]').value

    if (!content) {
        return
    }

    ajaxComment(person, replyTo, content, item)
    contentTextArea.value = ""
})

replyButtons.forEach(button => button.addEventListener('click', () => {
    const replyTo = document.querySelector('input[name="reply-to"]')
    replyTo.value = button.dataset.commentId

    const label = document.querySelector('.name-label')
    label.innerHTML += ` 
    <small>respondendo comentário #${replyTo.value}</small>
    <button class=\"cancel text-xs py-1 px-2 bg-red-100 rounded text-red-700\" onclick="cancel()">Cancelar</button>`
}))

function cancel() {
    label.innerHTML = initialLabel
    document.querySelector('input[name="reply-to"]').value = ""
}