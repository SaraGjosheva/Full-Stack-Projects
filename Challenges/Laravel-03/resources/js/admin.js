const addProjectBtn = document.querySelector('#add_project');
const changeProjectBtn = document.querySelector('#change_project');
const addSection = document.querySelector('#add_section');
const changeSection = document.querySelector('#change_section');
let cards = document.getElementsByClassName('card')
let edit = document.getElementsByClassName('edit');
let editCard = document.getElementsByClassName('edit_card');
let deleteCard = document.querySelector('#delete_card');
let close_edit = document.getElementsByClassName('close_edit');
let cardForm = document.getElementsByClassName('form')
let cardInfo = document.getElementsByClassName('card_info')
const modal = document.querySelector('#modal');
const openModalButton = document.getElementsByClassName('open_modal');
const closeModalButton = document.getElementsByClassName('close_modal');



addProjectBtn.addEventListener('click', () => {
    
    changeProjectBtn.classList.remove("borderAdd")
    addProjectBtn.classList.add('borderAdd')
    changeSection.classList.add('hidden')
    addSection.classList.remove("hidden")
})
changeProjectBtn.addEventListener('click', () => {
    
    changeProjectBtn.classList.add("borderAdd")
    addProjectBtn.classList.remove('borderAdd')
    addSection.classList.add("hidden")
    changeSection.classList.remove('hidden')
})

for (let i = 0; i < cards.length; i++) {
 cards[i].addEventListener('mouseover', function () {
    edit[i].classList.remove('hidden');
    
})

cards[i].addEventListener('mouseout', function () {
    edit[i].classList.add('hidden');
})
editCard[i].addEventListener('click',function(e){
    
    cardForm[i].classList.remove('hidden')
    cardInfo[i].classList.add('hidden')
})
close_edit[i].addEventListener('click',function (e) {
    cardForm[i].classList.add('hidden')
    cardInfo[i].classList.remove('hidden')
  })

  openModalButton[i].addEventListener('click', () => {
    modal.classList.remove('hidden');
  });
}
