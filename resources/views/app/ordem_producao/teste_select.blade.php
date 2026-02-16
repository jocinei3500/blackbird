<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Select Moderno Estilo Base44</title>
  <style>
    /* Estilos Gerais (para resetar o básico) */
    * { box-sizing: border-box; font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; }
    body { padding: 40px; background-color: #f8fafc; display: flex; justify-content: center; }

    /* Container do Select */
    .custom-select-container {
      position: relative;
      width: 300px; /* Largura do select */
      user-select: none;
    }

    /* O Botão Principal (o que aparece fechado) */
    .select-trigger {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
      padding: 10px 14px;
      font-size: 14px;
      color: #334155;
      background-color: #ffffff;
      border: 1px solid #cbd5e1;
      border-radius: 6px;
      cursor: pointer;
      transition: all 0.2s ease;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    /* Efeito Hover e Foco */
    .select-trigger:hover {
      border-color: #94a3b8;
    }
    
    .select-trigger:focus, 
    .custom-select-container.open .select-trigger {
      border-color: #3b82f6; /* Azul estilo Base44/Moderno */
      outline: none;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    /* Seta (ícone) */
    .arrow {
      width: 10px;
      height: 10px;
      border-right: 2px solid #64748b;
      border-bottom: 2px solid #64748b;
      transform: rotate(45deg) translateY(-2px);
      transition: transform 0.2s;
    }

    /* Girar seta quando aberto */
    .custom-select-container.open .arrow {
      transform: rotate(-135deg) translateY(-2px);
    }

    /* Lista de Opções (Dropdown) */
    .select-options {
      position: absolute;
      top: calc(100% + 6px);
      left: 0;
      width: 100%;
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 6px;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      max-height: 0;
      opacity: 0;
      overflow: hidden;
      transition: all 0.2s ease;
      z-index: 10;
    }

    /* Estado Aberto da Lista */
    .custom-select-container.open .select-options {
      max-height: 200px; /* Altura máxima com scroll */
      opacity: 1;
      overflow-y: auto;
    }

    /* Opção Individual */
    .option {
      padding: 10px 14px;
      font-size: 14px;
      color: #334155;
      cursor: pointer;
      transition: background 0.1s;
    }

    .option:hover {
      background-color: #f1f5f9;
      color: #0f172a;
    }

    .option.selected {
      background-color: #eff6ff;
      color: #3b82f6;
      font-weight: 500;
    }
  </style>
</head>
<body>

  <div class="custom-select-container" id="meuSelect">
    <div class="select-trigger">
      <span class="selected-text">Selecione uma opção</span>
      <div class="arrow"></div>
    </div>
    <div class="select-options">
      <div class="option" data-value="opcao1">Painel Administrativo</div>
      <div class="option" data-value="opcao2">Configurações de Usuário</div>
      <div class="option" data-value="opcao3">Relatórios Financeiros</div>
      <div class="option" data-value="opcao4">Integrações</div>
    </div>
    <input type="hidden" name="categoria" id="selectValue">
  </div>

  <script>
    // Lógica JavaScript
    const selectContainer = document.getElementById('meuSelect');
    const trigger = selectContainer.querySelector('.select-trigger');
    const options = selectContainer.querySelectorAll('.option');
    const selectedText = selectContainer.querySelector('.selected-text');
    const hiddenInput = document.getElementById('selectValue');

    // Abrir/Fechar ao clicar
    trigger.addEventListener('click', () => {
      selectContainer.classList.toggle('open');
    });

    // Selecionar opção
    options.forEach(option => {
      option.addEventListener('click', () => {
        // Remove classe 'selected' de todos e adiciona no atual
        options.forEach(opt => opt.classList.remove('selected'));
        option.classList.add('selected');

        // Atualiza texto e valor
        selectedText.textContent = option.textContent;
        hiddenInput.value = option.getAttribute('data-value'); // Valor para o backend
        
        // Fecha o select
        selectContainer.classList.remove('open');
        
        console.log("Valor selecionado:", hiddenInput.value);
      });
    });

    // Fechar ao clicar fora
    document.addEventListener('click', (e) => {
      if (!selectContainer.contains(e.target)) {
        selectContainer.classList.remove('open');
      }
    });
  </script>

</body>
</html>