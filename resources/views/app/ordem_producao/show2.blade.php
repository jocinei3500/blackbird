@extends('app.layouts.app')

@section('content')
    <!-- Google Fonts para ficar igual ao design (Inter) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
            color: #1e293b;
        }

        /* Utilitários do Design */
        .text-label {
            color: #64748b;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .text-value {
            color: #0f172a;
            font-size: 1.75rem;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .text-sub {
            font-size: 0.875rem;
            color: #94a3b8;
        }

        .text-success-custom {
            color: #10b981;
        }

        .text-danger-custom {
            color: #ef4444;
        }

        /* Cards Principais (Topo e Gráficos) */
        .dashboard-card {
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid #f1f5f9;
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02), 0 2px 4px -1px rgba(0, 0, 0, 0.02);
            height: 100%;
            position: relative;
            transition: transform 0.2s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
        }

        .card-warning-border {
            border: 1px solid #f0db97;
        }

        .card-simple {
            border: 1px solid #dddbd7;
        }

        /* Ícones Flutuantes */
        .icon-float {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
        }

        /* Botão de Data */
        .btn-date-picker {
            background: white;
            border: 1px solid #e2e8f0;
            color: #475569;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            font-weight: 500;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-date-picker:hover {
            background: #f8fafc;
        }

        /* Gráficos */
        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }

        /* --- NOVOS ESTILOS PARA EQUIPAMENTOS E PARADAS --- */

        /* Card de Equipamento Individual */
        .equip-card {
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            padding: 1.25rem;
            transition: all 0.2s ease;
            height: 100%;
        }

        .equip-card:hover {
            border-color: #cbd5e1;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            transform: translateY(-2px);
        }

        .equip-icon {
            width: 32px;
            height: 32px;
            background-color: #f1f5f9;
            color: #475569;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
        }

        /* Badges de Status (Pílula) */
        .badge-status {
            padding: 0.25rem 0.75rem;
            border-radius: 99px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .badge-status.success {
            background-color: #ecfdf5;
            color: #10b981;
            border: 1px solid #d1fae5;
        }

        .badge-status.warning {
            background-color: #fffbeb;
            color: #f59e0b;
            border: 1px solid #fef3c7;
        }

        .badge-status.danger {
            background-color: #fef2f2;
            color: #ef4444;
            border: 1px solid #fee2e2;
        }

        /* Card de Parada (Lista Lateral) */
        .stoppage-card {
            background: #ffffff;
            border-radius: 8px;
            padding: 1rem;
            border: 1px solid #f1f5f9;
            border-left-width: 4px;
            /* Borda grossa na esquerda */
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .stoppage-card.open {
            border-left-color: #f59e0b;
        }

        .stoppage-card.resolved {
            border-left-color: #10b981;
        }

        .stoppage-time {
            font-size: 0.75rem;
            color: #94a3b8;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 0.25rem;
        }

        /* outros stilos usados no select moderno*/

        /* Estilos Gerais (para resetar o básico) */
        * {
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            padding: 40px;
            background-color: #f8fafc;
            display: flex;
            justify-content: center;
        }

        /* Container do Select */
        .custom-select-container {
            position: relative;
            width: 300px;
            /* Largura do select */
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
            border-color: #3b82f6;
            /* Azul estilo Base44/Moderno */
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
            max-height: 200px;
            /* Altura máxima com scroll */
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

    <div class="container-fluid p-4">

        <!-- Cabeçalho -->
        <div class="d-flex justify-content-between align-items-start mb-5">
            <div>
                <h1 class="fw-bold mb-1"'' style="font-size: 2rem; color: #0f172a;">Dashboard Industrial</h1>
                <p class="mb-0 text-secondary">
                    Visão geral da operação • {{ now()->locale('pt_BR')->translatedFormat('d \d\e F \d\e Y') }}
                </p>
            </div>
            <div>
                {{-- <button class="btn-date-picker shadow-sm">
                <i class="fa-regular fa-calendar"></i>
                Últimos 30 dias
                <i class="fa-solid fa-chevron-down ms-2" style="font-size: 0.7rem;"></i>
            </button> --}}

                <div class="custom-select-container" id="meuSelect">
                    <div class="select-trigger">
                        <span class="selected-text"><i class="icofont-calendar"></i> Mês atual</span>
                        <div class="arrow"></div>
                    </div>
                    <div class="select-options">
                        <div class="option" data-value="opcao1">Últimos 30 dias</div>
                        <div class="option" data-value="opcao2">Últimos 7 dias</div>
                        <div class="option" data-value="opcao3">Último dia</div>
                        <div class="option" data-value="opcao4">Ano stual</div>
                    </div>
                    <input type="hidden" name="categoria" id="selectValue">
                </div>


            </div>
        </div>

        <!-- Linha de KPIs -->
        <div class="row g-4 mb-5">
            <!-- (Mantendo os Cards de KPI Originais...) -->
            <div class="col-xl-3 col-md-6">
                <div class="dashboard-card card-simple">
                    <div class="icon-float"><i class="icofont-chart-growth icofont-2x"></i></div>
                    <div class="text-label mb-2">Produção Total</div>
                    <div class="text-value mb-1">{{ number_format($producaoTotal ?? 20155, 0, ',', '.') }} ton</div>
                    <div class="text-sub mb-3">Últimos 30 dias</div>
                    <div class="d-flex align-items-center text-success-custom font-weight-bold" style="font-size: 0.85rem;">
                        <i class="fa-solid fa-arrow-trend-up me-1"></i> +12% vs período anterior
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="dashboard-card card-simple">
                    <div class="icon-float"><i class="icofont-articulated-truck icofont-2x"></i></div>
                    <div class="text-label mb-2">Equipamentos Operando</div>
                    <div class="text-value mb-1">{{ $equipamentosOperando ?? '7' }}/{{ $totalEquipamentos ?? '9' }}</div>
                    <div class="text-sub mb-3">{{ $disponibilidade ?? '78' }}% disponível</div>
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 78%"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="dashboard-card card-simple">
                    <div class="icon-float"><i class="icofont-wall-clock icofont-2x"></i></div>
                    <div class="text-label mb-2">Horas de Parada</div>
                    <div class="text-value mb-1">{{ $horasParada ?? '45.5' }}h</div>
                    <div class="text-sub mb-3">No período selecionado</div>
                    <div class="d-flex align-items-center text-success-custom font-weight-bold" style="font-size: 0.85rem;">
                        <i class="fa-solid fa-check me-1"></i> Dentro do esperado
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="dashboard-card card-warning-border">
                    <div class="icon-float text-warning border-warning bg-soft-warning">
                        <i class="icofont-exclamation-tringle icofont-2x"></i>
                    </div>
                    <div class="text-label mb-2 text-warning">Paradas em Aberto</div>
                    <div class="text-value mb-1">{{ $paradasAberto ?? '2' }}</div>
                    <div class="text-sub mb-3">Aguardando resolução</div>
                    <button class="btn btn-sm btn-outline-warning w-100 fw-bold" style="border-radius: 8px;">Ver
                        Detalhes</button>
                </div>
            </div>
        </div>

        <!-- Linha de Gráficos -->
        <div class="row g-4 mb-5">
            <div class="col-lg-8">
                <div class="dashboard-card">
                    <h5 class="fw-bold mb-4" style="color: #334155;">Produção Diária (toneladas)</h5>
                    <div class="chart-container">
                        <canvas id="productionChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="dashboard-card">
                    <h5 class="fw-bold mb-4" style="color: #334155;">Distribuição de Paradas</h5>
                    <div class="chart-container">
                        <canvas id="stoppageChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- NOVA SEÇÃO: Status e Paradas Recentes -->
        <div class="row g-4">
            <!-- Esquerda: Grid de Status dos Equipamentos -->
            <div class="col-lg-8">
                <h5 class="fw-bold mb-4" style="color: #334155;">Status dos Equipamentos</h5>

                <div class="row g-3">
                    <!-- Exemplo 1: Britador (Operando) -->
                    <div class="col-md-4">
                        <div class="equip-card">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="equip-icon"><i class="fa-solid fa-gear"></i></div>
                                <span class="badge-status success"><i class="fa-solid fa-check-circle"></i> Operando</span>
                            </div>
                            <h6 class="fw-bold mb-0 text-dark">Britador Cone 90 S</h6>
                            <div class="small text-muted mb-3">BC02 • 90 S</div>
                            <div class="d-flex justify-content-between align-items-center pt-2 border-top border-light">
                                <span class="small text-secondary fw-semibold">Horímetro</span>
                                <span class="fw-bold text-dark">156h</span>
                            </div>
                        </div>
                    </div>

                    <!-- Exemplo 2: Britador Mandíbula (Operando) -->
                    <div class="col-md-4">
                        <div class="equip-card">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="equip-icon"><i class="fa-solid fa-gear"></i></div>
                                <span class="badge-status success"><i class="fa-solid fa-check-circle"></i>
                                    Operando</span>
                            </div>
                            <h6 class="fw-bold mb-0 text-dark">Britador Mandíbula</h6>
                            <div class="small text-muted mb-3">BM01 • Metso C120</div>
                            <div class="d-flex justify-content-between align-items-center pt-2 border-top border-light">
                                <span class="small text-secondary fw-semibold">Horímetro</span>
                                <span class="fw-bold text-dark">126h</span>
                            </div>
                        </div>
                    </div>

                    <!-- Exemplo 3: Britador Cone RS (Operando) -->
                    <div class="col-md-4">
                        <div class="equip-card">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="equip-icon"><i class="fa-solid fa-gear"></i></div>
                                <span class="badge-status success"><i class="fa-solid fa-check-circle"></i>
                                    Operando</span>
                            </div>
                            <h6 class="fw-bold mb-0 text-dark">Britador Cone 90 RS</h6>
                            <div class="small text-muted mb-3">BC01 • 90 RS</div>
                            <div class="d-flex justify-content-between align-items-center pt-2 border-top border-light">
                                <span class="small text-secondary fw-semibold">Horímetro</span>
                                <span class="fw-bold text-dark">182h</span>
                            </div>
                        </div>
                    </div>

                    <!-- Exemplo 4: Escavadeira CAT (Operando) -->
                    <div class="col-md-4">
                        <div class="equip-card">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="equip-icon"><i class="fa-solid fa-gear"></i></div>
                                <span class="badge-status success"><i class="fa-solid fa-check-circle"></i>
                                    Operando</span>
                            </div>
                            <h6 class="fw-bold mb-0 text-dark">Escavadeira CAT</h6>
                            <div class="small text-muted mb-3">ESC-001 • CAT 320D</div>
                            <div class="d-flex justify-content-between align-items-center pt-2 border-top border-light">
                                <span class="small text-secondary fw-semibold">Horímetro</span>
                                <span class="fw-bold text-dark">15.680h</span>
                            </div>
                        </div>
                    </div>

                    <!-- Exemplo 5: Escavadeira Volvo (Manutenção) -->
                    <div class="col-md-4">
                        <div class="equip-card" style="background-color: #fef2f2; border-color: #fee2e2;">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="equip-icon bg-white text-danger"><i class="fa-solid fa-wrench"></i></div>
                                <span class="badge-status danger"><i class="fa-solid fa-screwdriver-wrench"></i>
                                    Manutenção</span>
                            </div>
                            <h6 class="fw-bold mb-0 text-dark">Escavadeira Volvo</h6>
                            <div class="small text-muted mb-3">ESC-002 • Volvo EC480</div>
                            <div
                                class="d-flex justify-content-between align-items-center pt-2 border-top border-danger-subtle">
                                <span class="small text-secondary fw-semibold">Horímetro</span>
                                <span class="fw-bold text-dark">9.340h</span>
                            </div>
                        </div>
                    </div>

                    <!-- Exemplo 6: Carregadeira (Operando) -->
                    <div class="col-md-4">
                        <div class="equip-card">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="equip-icon"><i class="fa-solid fa-truck"></i></div>
                                <span class="badge-status success"><i class="fa-solid fa-check-circle"></i>
                                    Operando</span>
                            </div>
                            <h6 class="fw-bold mb-0 text-dark">Carregadeira L180</h6>
                            <div class="small text-muted mb-3">CAR-001 • Volvo L180H</div>
                            <div class="d-flex justify-content-between align-items-center pt-2 border-top border-light">
                                <span class="small text-secondary fw-semibold">Horímetro</span>
                                <span class="fw-bold text-dark">11.200h</span>
                            </div>
                        </div>
                    </div>

                    <!-- Exemplo 7: Caminhão (Operando) -->
                    <div class="col-md-4">
                        <div class="equip-card">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="equip-icon"><i class="fa-solid fa-truck"></i></div>
                                <span class="badge-status success"><i class="fa-solid fa-check-circle"></i>
                                    Operando</span>
                            </div>
                            <h6 class="fw-bold mb-0 text-dark">Caminhão Fora Est. 01</h6>
                            <div class="small text-muted mb-3">CAM-001 • CAT 773G</div>
                            <div class="d-flex justify-content-between align-items-center pt-2 border-top border-light">
                                <span class="small text-secondary fw-semibold">Horímetro</span>
                                <span class="fw-bold text-dark">18.750h</span>
                            </div>
                        </div>
                    </div>

                    <!-- Exemplo 8: Caminhão (Parado) -->
                    <div class="col-md-4">
                        <div class="equip-card" style="background-color: #fffbeb; border-color: #fef3c7;">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="equip-icon bg-white text-warning"><i class="fa-solid fa-truck"></i></div>
                                <span class="badge-status warning"><i class="fa-solid fa-pause-circle"></i> Parado</span>
                            </div>
                            <h6 class="fw-bold mb-0 text-dark">Caminhão Fora Est. 02</h6>
                            <div class="small text-muted mb-3">CAM-002 • CAT 773G</div>
                            <div
                                class="d-flex justify-content-between align-items-center pt-2 border-top border-warning-subtle">
                                <span class="small text-secondary fw-semibold">Horímetro</span>
                                <span class="fw-bold text-dark">16.420h</span>
                            </div>
                        </div>
                    </div>

                    <!-- Exemplo 9: Caminhão (Operando) -->
                    <div class="col-md-4">
                        <div class="equip-card">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="equip-icon"><i class="fa-solid fa-truck"></i></div>
                                <span class="badge-status success"><i class="fa-solid fa-check-circle"></i>
                                    Operando</span>
                            </div>
                            <h6 class="fw-bold mb-0 text-dark">Caminhão Fora Est. 03</h6>
                            <div class="small text-muted mb-3">CAM-003 • Komatsu HD785</div>
                            <div class="d-flex justify-content-between align-items-center pt-2 border-top border-light">
                                <span class="small text-secondary fw-semibold">Horímetro</span>
                                <span class="fw-bold text-dark">14.890h</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Direita: Lista de Paradas Recentes -->
            <div class="col-lg-4">
                <h5 class="fw-bold mb-4" style="color: #334155;">Paradas Recentes</h5>

                <div class="d-flex flex-column gap-3">
                    <!-- Parada 1 (Em Aberto) -->
                    <div class="stoppage-card open">
                        <div class="d-flex justify-content-between align-items-start">
                            <h6 class="fw-bold text-dark mb-1">Caminhão Fora Estrada 02</h6>
                            <span class="badge bg-warning text-dark border border-warning-subtle rounded-pill"
                                style="font-size: 0.7em;"><i class="fa-regular fa-clock"></i> Em aberto</span>
                        </div>
                        <div class="text-secondary fw-semibold small mb-2">Aguardando Peça</div>
                        <div class="stoppage-time mb-2">
                            <i class="fa-regular fa-calendar"></i> 07/02 14:30
                            <span class="text-muted">•</span>
                            16h de duração
                        </div>
                        <p class="small text-muted mb-0 bg-light p-2 rounded">
                            Aguardando rolamento do diferencial
                        </p>
                    </div>

                    <!-- Parada 2 (Em Aberto) -->
                    <div class="stoppage-card open">
                        <div class="d-flex justify-content-between align-items-start">
                            <h6 class="fw-bold text-dark mb-1">Escavadeira Volvo</h6>
                            <span class="badge bg-warning text-dark border border-warning-subtle rounded-pill"
                                style="font-size: 0.7em;"><i class="fa-regular fa-clock"></i> Em aberto</span>
                        </div>
                        <div class="text-secondary fw-semibold small mb-2">Manutenção Corretiva</div>
                        <div class="stoppage-time mb-2">
                            <i class="fa-regular fa-calendar"></i> 06/02 08:00
                            <span class="text-muted">•</span>
                            24h de duração
                        </div>
                        <p class="small text-muted mb-0 bg-light p-2 rounded">
                            Problema no sistema hidráulico - vazamento no cilindro da lança
                        </p>
                    </div>

                    <!-- Parada 3 (Resolvido) -->
                    <div class="stoppage-card resolved">
                        <div class="d-flex justify-content-between align-items-start">
                            <h6 class="fw-bold text-dark mb-1">Caminhão Fora Estrada 01</h6>
                            <span class="badge bg-soft-success text-success border border-success-subtle rounded-pill"
                                style="font-size: 0.7em;"><i class="fa-solid fa-check"></i> Resolvido</span>
                        </div>
                        <div class="text-secondary fw-semibold small mb-2">Falta de Combustível</div>
                        <div class="stoppage-time mb-2">
                            <i class="fa-regular fa-calendar"></i> 04/02 11:00
                            <span class="text-muted">•</span>
                            1.5h de duração
                        </div>
                        <p class="small text-muted mb-0 bg-light p-2 rounded">
                            Atraso no abastecimento
                        </p>
                    </div>

                    <!-- Parada 4 (Resolvido) -->
                    <div class="stoppage-card resolved">
                        <div class="d-flex justify-content-between align-items-start">
                            <h6 class="fw-bold text-dark mb-1">Britador Mandíbula 60x80</h6>
                            <span class="badge bg-soft-success text-success border border-success-subtle rounded-pill"
                                style="font-size: 0.7em;"><i class="fa-solid fa-check"></i> Resolvido</span>
                        </div>
                        <div class="text-secondary fw-semibold small mb-2">Manutenção Preventiva</div>
                        <div class="stoppage-time mb-2">
                            <i class="fa-regular fa-calendar"></i> 03/02 06:00
                            <span class="text-muted">•</span>
                            4h de duração
                        </div>
                        <p class="small text-muted mb-0 bg-light p-2 rounded">
                            Troca de correias e lubrificação geral
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Configuração Comum para Estilo Clean
            Chart.defaults.font.family = "'Inter', sans-serif";
            Chart.defaults.color = '#64748b';

            // 1. Gráfico de Produção (Area Chart Azul)
            const ctxProd = document.getElementById('productionChart').getContext('2d');

            // Criando gradiente azul suave
            const gradientProd = ctxProd.createLinearGradient(0, 0, 0, 400);
            gradientProd.addColorStop(0, 'rgba(59, 130, 246, 0.2)'); // Azul forte transparente
            gradientProd.addColorStop(1, 'rgba(59, 130, 246, 0)'); // Transparente

            // Dados simulados (substitua pelo Ajax)
            const labelsProd = ['01/02', '02/02', '03/02', '04/02', '05/02', '06/02', '07/02', '08/02', '09/02'];
            const dataProd = [2400, 2600, 2500, 2800, 2200, 2700, 2400, 2100, 800];

            new Chart(ctxProd, {
                type: 'line',
                data: {
                    labels: labelsProd,
                    datasets: [{
                        label: 'Produção',
                        data: dataProd,
                        borderColor: '#3b82f6', // Azul Tailwind
                        backgroundColor: gradientProd,
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4, // Curva suave
                        pointRadius: 0, // Sem pontos por padrão
                        pointHoverRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: '#1e293b',
                            padding: 12,
                            titleFont: {
                                size: 13
                            },
                            bodyFont: {
                                size: 13
                            },
                            cornerRadius: 8,
                            displayColors: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#f1f5f9',
                                borderDash: [5, 5]
                            },
                            ticks: {
                                padding: 10
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                padding: 10
                            }
                        }
                    }
                }
            });

            // 2. Gráfico de Distribuição de Paradas (Donut Colorido)
            const ctxStop = document.getElementById('stoppageChart').getContext('2d');

            new Chart(ctxStop, {
                type: 'doughnut',
                data: {
                    labels: ['Aguardando Peça', 'Manutenção Corretiva', 'Falta de Combustível',
                        'Manutenção Preventiva'
                    ],
                    datasets: [{
                        data: [15, 45, 10, 30], // Exemplo
                        backgroundColor: [
                            '#ef4444', // Vermelho
                            '#f59e0b', // Laranja
                            '#3b82f6', // Azul
                            '#8b5cf6' // Roxo
                        ],
                        borderWidth: 0,
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%', // Rosca fina
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                                padding: 20,
                                font: {
                                    size: 11
                                }
                            }
                        }
                    }
                }
            });
        });



        //script usado para select moderno base 44

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
@endsection
