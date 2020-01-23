function validacao(){
    /*VERIFICA CAMPO DE E-MAIL*/
    if(document.form.email.value=="" || document.form.email.value.indexOf('@')==-1 || document.form.email.value.indexOf('.')==-1){
        /*Mostra no campo*/
        document.form.email.focus();
        return false;
    }

    /*VERIFICA CAMPO DE SENHA*/
    if(document.form.senha.value.lenght < 8){
        /*Mostra no campo*/
        document.form.senha.focus();
        return false;
    }
}