
window.onload = ()=>{
    const file = document.querySelector('#file')

    file.addEventListener("change",()=> {
        const form = document.querySelector("#form");
        form.submit()
    });

   
}