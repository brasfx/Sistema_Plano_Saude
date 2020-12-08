const validaForm = () => {
  var nome = form_medico.nome.value;
  var sobrenome = form_medico.sobrenome.value;
  var telefone = form_medico.telefone.value;
  var end = form_medico.endereço.value;
  var crm = form_medico.crm.value;
  var esp = form_medico.especiazação.value;
  var email = form_medico.email.value;
  var senha = form_medico.senha.value;

  if (nome == '') {
    alert('Preencha o campo com seu nome');
    form_medico.nome.focus();
    return false;
  }
  if (sobrenome == '') {
    alert('Preencha o campo com seu sobrenome');
    form_medico.sobrenome.focus();
    return false;
  }

  if (telefone == '') {
    alert('Preencha o campo com seu sobrenome');
    form_medico.telefone.focus();
    return false;
  }
  if (end == '') {
    alert('Preencha o campo com seu endereço');
    form_medico.endereço.focus();
    return false;
  }
  if (crm == '') {
    alert('Preencha o campo com seu CRM');
    form_medico.crm.focus();
    return false;
  }
  if (esp == '') {
    alert('Preencha o campo com sua especialização');
    form_medico.especialização.focus();
    return false;
  }

  if (email == '') {
    alert('Preencha o campo com seu login');
    form_medico.email.focus();
    return false;
  }

  if (senha == '') {
    alert('Preencha o campo com sua senha');
    form_medico.senha.focus();
    return false;
  }
  if (senha.length < 6) {
    alert('Preencha o campo com senha maior de 6 dígitos');
    form_medico.senha.focus();
    return false;
  }
};
