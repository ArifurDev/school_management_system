const examInput = document.getElementById("examSelector");
const classInput = document.getElementById("classSelector");

const setExamId = document.getElementById("setExamId");
const setClassId = document.getElementById("setClassId");


examInput.addEventListener("change" , (e) =>{
    let input = e.target.value ;
    setExamId.value = input;
})

classInput.addEventListener("change" , (e) =>{
    let input = e.target.value ;
    setClassId.value = input;
})