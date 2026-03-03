# Questão 1:

#Váriaveis de entrada: temperatura e umidade do solo
#Váriaveis de saída: tempo de irrigação (em minutos)

#Se a umidade é baixa e a temperatura é alta, então o tempo de irrigação é longo.

#Se a umidade é média e a temperatura é média, então o tempo de irrigação é médio.

#Se a umidade é alta ou a temperatura é baixa, então o tempo de irrigação é curto.

umidade = ctrl.Antecedent(np.arange(0, 101, 1), 'umidade')  # em %
temperatura = ctrl.Antecedent(np.arange(0, 41, 1), 'temperatura')  # em °C
tempo_irrigacao = ctrl.Consequent(np.arange(0, 61, 1), 'tempo_irrigacao')  # em minutos

# 1.2 Gerando automaticamente os conjuntos fuzzy com 3 termos
umidade.automf(3)  # low, average, high
temperatura.automf(3)

# 1.3 Conjuntos fuzzy da saída definidos manualmente
tempo_irrigacao['curto'] = fuzz.trimf(tempo_irrigacao.universe, [0, 0, 20])
tempo_irrigacao['medio'] = fuzz.trimf(tempo_irrigacao.universe, [10, 30, 50])
tempo_irrigacao['longo'] = fuzz.trimf(tempo_irrigacao.universe, [40, 60, 60])

# 2. Criando regras fuzzy
regra1 = ctrl.Rule(umidade['poor'] & temperatura['good'], tempo_irrigacao['longo'])
regra2 = ctrl.Rule(umidade['average'] & temperatura['average'], tempo_irrigacao['medio'])
regra3 = ctrl.Rule(umidade['good'] | temperatura['poor'], tempo_irrigacao['curto'])

# 3. Sistema de controle
sistema_irrigacao = ctrl.ControlSystem([regra1, regra2, regra3])
simulador = ctrl.ControlSystemSimulation(sistema_irrigacao)

# 4. Entradas do sistema (exemplo)
simulador.input['umidade'] = 50  # Umidade atual em %
simulador.input['temperatura'] = 28  # Temperatura em °C

# 4.1 Executando simulação
simulador.compute()

# 4.2 Resultado
print(f"Tempo sugerido de irrigação: {simulador.output['tempo_irrigacao']:.2f} minutos")
tempo_irrigacao.view(sim=simulador)

#Teste o sistema anterior com as entradas:

#Temperatura = 32 °C, Umidade = 25%, Tempo Sugerido: 37.76 minutos

#Temperatura = 20 °C, Umidade = 80%, Tempo Sugerido: 21.44 minutos

#Temperatura = 28 °C, Umidade = 50%, Tempo Sugerido: 30.00 minutos

#Anote os tempos sugeridos.




#Questão 2:

#Problemas: Sistema de Irrigação Automatizado – Custo x Benefício. Um produtor rural está avaliando se vale a pena instalar um sistema de irrigação automático com sensores e controle fuzzy. A decisão será baseada em dois fatores:
#Custo de Instalação (em R$)

#Ganho Esperado de Produção (em %)

#Objetivo:

#Avaliar o nível de benefício da instalação com base fuzzy, considerando:

#Quanto menor o custo e maior o ganho, maior o benefício.

#Se o custo for alto e o ganho for pequeno, o benefício é baixo.

#Variáveis fuzzy:

#Entradas:

#Custo (baixo, médio, alto) → R 0aR 20.000

#Ganho de Produção (baixo, médio, alto) → 0% a 50%

#Saída:

#Benefício (baixo, médio, alto) → 0 a 100

custo = ctrl.Antecedent(np.arange(0, 20001, 1), )
ganho_producao = ctrl.Antecedent(np.arange(0, 51, 1), )
beneficio = ctrl.Consequent(np.arange(0, 101, 1), )

custo.automf(3)
ganho_producao.automf(3)

regra1 = ctrl.Rule(custo['baixo'] & ganho_producao['alta'], beneficio['alto'])
regra2 = ctrl.Rule(custo['alto'] & ganho_producao['baixo'], beneficio['baixo'])
regra3 = ctrl.Rule(custo['medio'] & ganho_producao['medio'], beneficio['medio'])
regra4 = ctrl.Rule(custo['alto'] & ganho_producao['baixo'], beneficio['baixo'])
regra5
