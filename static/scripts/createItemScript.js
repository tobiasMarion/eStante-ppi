const collectionSelect = document.querySelector('#collection')
const newCollection = document.querySelector('#newCollection')
const cdu = document.querySelector('#cdu')
const newCollectionButton = document.querySelector('#newCollectionButton')
const isbn = document.querySelector('#isbn')

newCollectionButton.addEventListener('click', () => {
    collectionSelect.value = '+'
    newCollection.disabled = false
    cdu.disabled = false
    newCollection.focus()
})

collectionSelect.addEventListener('change', () => {
    if (collectionSelect.value == '+') {
        newCollection.disabled = false
        cdu.disabled = false
        newCollection.focus()
    } else {
        const option = collectionSelect.options[collectionSelect.selectedIndex]
        newCollection.disabled = true
        cdu.disabled = true
        newCollection.value = option.text
        cdu.value = option.dataset.cdu
        isbn.focus()
    }
})

const isDigital = document.querySelector('#digital')
const isPhysical = document.querySelector('#physical')

const urlInput = document.querySelector('#url')
const inventoryInput = document.querySelector('#inventory')

function changeItemType() {
    if (isDigital.checked) {
        urlInput.disabled = false
        inventoryInput.disabled = true
        urlInput.focus()
    } else {
        urlInput.disabled = true
        inventoryInput.disabled = false
        inventoryInput.focus()
    }
}

isDigital.addEventListener('change', changeItemType)
isPhysical.addEventListener('change', changeItemType)

