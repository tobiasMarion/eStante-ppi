const inputs = document.querySelectorAll('.input-container-effect input')

inputs.forEach(input => {
    input.addEventListener('focus', event => {
        event.target.parentElement.classList.add('active')
    })
    input.addEventListener('blur', event => {
        event.target.parentElement.classList.remove('active')
    })
})