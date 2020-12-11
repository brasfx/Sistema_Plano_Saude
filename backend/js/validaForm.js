const formAdmin = ({ nome, CPF, senha }) => {
  if (nome.value.length < 3) {
    alert('Por favor, insira um nome válido!');
    nome.focus();
    return false;
  }

  if (CPF.value.length < 11) {
    alert('CPF inválido! Necessário ter 11 digitos.');
    CPF.focus();
    return false;
  }

  if (senha.value.length < 6) {
    alert('Senha muito curta!');
    senha.focus();
    return false;
  }
  if (senha.value === CPF.value) {
    alert('Senha deve ser diferente do CPF!');
    senha.focus();
    return false;
  }
};

const formMed = ({ nome, CRM, senha }) => {
  if (nome.value.length < 3) {
    alert('Por favor, insira um nome válido!');
    nome.focus();
    return false;
  }

  if (CRM.value.length < 6) {
    alert('CRM inválido! Necessário ter 6 digitos.');
    CRM.focus();
    return false;
  }

  if (senha.value.length < 6) {
    alert('Senha muito curta!');
    senha.focus();
    return false;
  }
  if (senha.value === CRM.value) {
    alert('Senha deve ser diferente do CRM!');
    senha.focus();
    return false;
  }
};

const formPac = ({ nome, CPF, senha }) => {
  if (nome.value.length < 3) {
    alert('Por favor, insira um nome válido!');
    nome.focus();
    return false;
  }

  if (CPF.value.length < 11) {
    alert('CPF inválido! Necessário ter 11 digitos.');
    CPF.focus();
    return false;
  }

  if (senha.value.length < 6) {
    alert('Senha muito curta!');
    senha.focus();
    return false;
  }
  if (senha.value === CPF.value) {
    alert('Senha deve ser diferente do CPF!');
    senha.focus();
    return false;
  }
};

const formLab = ({ nome, CRM: CNPJ, senha }) => {
  if (nome.value.length < 3) {
    alert('Por favor, insira um nome válido!');
    nome.focus();
    return false;
  }

  if (CNPJ.value.length < 11) {
    alert('CNPJ inválido! Necessário ter 11 digitos.');
    CNPJ.focus();
    return false;
  }

  if (senha.value.length < 6) {
    alert('Senha muito curta!');
    senha.focus();
    return false;
  }
  if (senha.value === CNPJ.value) {
    alert('Senha deve ser diferente do CNPJ!');
    senha.focus();
    return false;
  }
};

const formExame = ({ CPF, tipoExame, resultados }) => {
  if (CPF.value.length < 11) {
    alert('CPF inválido! Necessário ter 11 digitos.');
    CPF.focus();
    return false;
  }

  if (tipoExame.value.length < 3) {
    alert('Nome muito curto, verifique se está correto!');
    tipoExame.focus();
    return false;
  }
  if (resultados.value.length < 5) {
    alert('Detalhe melhor o resultado!');
    resultados.focus();
    return false;
  }
};

const formConsulta = ({ CPF, receita, observacoes }) => {
  if (CPF.value.length < 11) {
    alert('CPF inválido! Necessário ter 11 digitos.');
    CPF.focus();
    return false;
  }

  if (receita.value.length < 3) {
    alert('Certeza que é só isso?');
    receita.focus();
    return false;
  }
  if (observacoes.value.length < 3) {
    alert('Detalhe melhor o resultado!');
    observacoes.focus();
    return false;
  }
};
