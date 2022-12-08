const buttons = document.querySelectorAll('article > div > button')

function ajaxModerate(commentID, operation) {
    const xhr = new XMLHttpRequest()
    const url = './item/moderate-comments.php'
    xhr.open('POST', url, true)
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xhr.send(`comment=${commentID}&operation=${operation}`)
}

buttons.forEach(button => button.addEventListener('click', () => {
    const commentID = button.dataset.commentId
    const operation = button.innerHTML


    const comment = document.querySelector(`.comment-${commentID}`)
    ajaxModerate(commentID, operation)

    comment.remove()
}))