const form = document.querySelector('.search-form')
const select = document.querySelector('select[name="search-for"]')
const initialAction = form.action

select.addEventListener('change', () => {
    if (select.value == "person") {
        form.action = initialAction.replace('search', 'user/search')
    } else {
        form.action = initialAction
    }

    console.log(form.action)
})