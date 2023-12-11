
const sectionInput = document.getElementById("section");
const classInput = document.getElementById("class");


const setSection = document.getElementById("setSection");
const setClassId = document.getElementById("setClassId");


sectionInput.addEventListener("keyup" , (e) =>{
    let input = e.target.value ;
    setSection.value = input;
})

classInput.addEventListener("change" , (e) =>{
    let input = e.target.value ;
    setClassId.value = input;
})