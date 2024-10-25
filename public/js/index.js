// let alertaSucesso = document.querySelector('#msg-sucesso-on');
// let xis = document.querySelector('.bi-x');
// let btnForm = document.querySelector('#form-btn');
// let boxVoltarTopo = document.querySelector('#voltar-inicio a');

// window.onscroll = function() {escondeBtnTopo()};

// function escondeBtnTopo() {

//     if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
//         boxVoltarTopo.style.display = 'flex';
//     } 
//     else {
//         boxVoltarTopo.style.display = 'none';
//     }             

// }

// xis.addEventListener('click', ()=>{
//     alertaSucesso.style.display = 'none';
// } );


// let telPrinc = document.querySelector('#telefone');

// telPrinc.addEventListener('input',function(e){

//     let tecla = e.data;
//     let backspace = e.inputType;

//     if((tecla === "0") || (tecla === "1") || (tecla === "2") || (tecla === "3") || (tecla === "4") 
//     || (tecla === "5") || (tecla === "6") || (tecla === "7") || (tecla === "8") || (tecla === "9") 

//     ){

//         if(telPrinc.value.length==1){

//             telPrinc.value =  '('+telPrinc.value;

//         }else if(telPrinc.value.length==3){

//             telPrinc.value = telPrinc.value+')';

//         }else if(telPrinc.value.length==9){

//             telPrinc.value = telPrinc.value+'-';

//         }

//         sessionStorage.setItem('lastInput',telPrinc.value);
//         // console.log(sessionStorage.getItem('lastInput'));


//     }else if( (backspace !== "deleteContentBackward") && ((tecla !== "0") || (tecla !== "1") || (tecla !== "2") || (tecla !== "3") || (tecla !== "4") 
//     || (tecla !== "5") || (tecla !== "6") || (tecla !== "7") || (tecla !== "8") || (tecla !== "9") 
//     ) ){
//         telPrinc.value = sessionStorage.getItem('lastInput');

//     }

// });


