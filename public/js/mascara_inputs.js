let cpf = document.querySelector('#cpf');
let cep = document.querySelector('#cep');
let telefone = document.querySelector('#telefone');
// let dataNasc = document.querySelector('#data-nascimento');

cpf.addEventListener('input',function(e){

    let tecla = e.data;
    let backspace = e.inputType;

    if((tecla === "0") || (tecla === "1") || (tecla === "2") || (tecla === "3") || (tecla === "4") 
    || (tecla === "5") || (tecla === "6") || (tecla === "7") || (tecla === "8") || (tecla === "9") 

    ){

        if(cpf.value.length==3){

            cpf.value = cpf.value+'.';

        }else if(cpf.value.length==7){

            cpf.value = cpf.value+'.';

        }else if(cpf.value.length==11){

            cpf.value = cpf.value+'-';
        }

        sessionStorage.setItem('lastInput',cpf.value);
        // console.log(sessionStorage.getItem('lastInput'));


    }else if( (backspace !== "deleteContentBackward") && ((tecla !== "0") || (tecla !== "1") || (tecla !== "2") || (tecla !== "3") || (tecla !== "4") 
    || (tecla !== "5") || (tecla !== "6") || (tecla !== "7") || (tecla !== "8") || (tecla !== "9") 
    ) ){
        cpf.value = sessionStorage.getItem('lastInput');

    }

});

cep.addEventListener('input',function(e){

    let tecla = e.data;
    let backspace = e.inputType;

    if((tecla === "0") || (tecla === "1") || (tecla === "2") || (tecla === "3") || (tecla === "4") 
    || (tecla === "5") || (tecla === "6") || (tecla === "7") || (tecla === "8") || (tecla === "9") 

    ){

        if(cep.value.length==2){

            cep.value = cep.value+'.';

        }else if(cep.value.length==6){

            cep.value = cep.value+'-';

        }

        sessionStorage.setItem('lastInput',cep.value);
        // console.log(sessionStorage.getItem('lastInput'));


    }else if( (backspace !== "deleteContentBackward") && ((tecla !== "0") || (tecla !== "1") || (tecla !== "2") || (tecla !== "3") || (tecla !== "4") 
    || (tecla !== "5") || (tecla !== "6") || (tecla !== "7") || (tecla !== "8") || (tecla !== "9") 
    ) ){
        cep.value = sessionStorage.getItem('lastInput');

    }

});




telefone.addEventListener('input',function(e){

    let tecla = e.data;
    let backspace = e.inputType;

    if((tecla === "0") || (tecla === "1") || (tecla === "2") || (tecla === "3") || (tecla === "4") 
    || (tecla === "5") || (tecla === "6") || (tecla === "7") || (tecla === "8") || (tecla === "9") 

    ){

        if(telefone.value.length==1){

            telefone.value =  '('+telefone.value;

        }else if(telefone.value.length==3){

            telefone.value = telefone.value+')';

        }else if(telefone.value.length==9){

            telefone.value = telefone.value+'-';

        }

        sessionStorage.setItem('lastInput',telefone.value);
        // console.log(sessionStorage.getItem('lastInput'));


    }else if( (backspace !== "deleteContentBackward") && ((tecla !== "0") || (tecla !== "1") || (tecla !== "2") || (tecla !== "3") || (tecla !== "4") 
    || (tecla !== "5") || (tecla !== "6") || (tecla !== "7") || (tecla !== "8") || (tecla !== "9") 
    ) ){
        telefone.value = sessionStorage.getItem('lastInput');

    }

});




// dataNasc.addEventListener('input',function(e){

//     let tecla = e.data;
//     let backspace = e.inputType;

//     if((tecla === "0") || (tecla === "1") || (tecla === "2") || (tecla === "3") || (tecla === "4") 
//     || (tecla === "5") || (tecla === "6") || (tecla === "7") || (tecla === "8") || (tecla === "9") 

//     ){

//         if(dataNasc.value.length==2){

//             dataNasc.value = dataNasc.value+'/';

//         }else if(dataNasc.value.length==5){

//             dataNasc.value = dataNasc.value+'/';

//         }

//         sessionStorage.setItem('lastInput',dataNasc.value);
//         // console.log(sessionStorage.getItem('lastInput'));


//     }else if( (backspace !== "deleteContentBackward") && ((tecla !== "0") || (tecla !== "1") || (tecla !== "2") || (tecla !== "3") || (tecla !== "4") 
//     || (tecla !== "5") || (tecla !== "6") || (tecla !== "7") || (tecla !== "8") || (tecla !== "9") 
//     ) ){
//         dataNasc.value = sessionStorage.getItem('lastInput');

//     }

// });



