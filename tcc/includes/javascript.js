function validacao() {
   
    
    if (document.form.placa.value != "") {
        M.toast({ html: 'Por favor, preencha o campo "Hora de entrada"' });
        document.form.placa.focus();
        return false;
    }

    
}

