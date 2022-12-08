const buttons = document.querySelectorAll('button.promote')

function ajaxPromote(id, permissionLevel) {
    const xhr = new XMLHttpRequest()
    const url = '../user/promote.php'
    xhr.open('POST', url, true)
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xhr.send(`person-id=${id}&permission-level=${permissionLevel}`);
}

buttons.forEach(button => button.addEventListener('click', () => {
    const id = button.dataset.personid
    const permissionLevel = button.dataset.permissionlevel
    const permissionLabel = document.querySelector(`.permission-level-${id}`)
    console.log(permissionLabel)

    ajaxPromote(id, permissionLevel);

    let option

    switch (permissionLevel) {
        case 'Administrador':
            button.dataset.permissionlevel = 'Leitor'
            option = 'Moderador'
            break;

        case 'Funcionário':
            button.dataset.permissionlevel = 'Administrador'
            option = 'Leitor'
            break;

        case 'Moderador':
            button.dataset.permissionlevel = 'Funcionário'
            option = 'Administrador'
            break;

        default:
            button.dataset.permissionlevel = 'Moderador'
            option = 'Funcionário'
            break;
    }

    button.innerHTML = `<img src="../static/assets/icons/promote.svg" alt="Copiar"> Tornar ${option}`
    permissionLabel.innerHTML = button.dataset.permissionlevel;
}))