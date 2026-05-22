/* script.js — versão atualizada
   - Histórico do cliente: botão único centralizado
   - Cliente digita telefone e vê seus agendamentos
   - Accordion agora diz "Agenda Samuel" (centralizado)
*/

(() => {
  const $ = (s, ctx = document) => ctx.querySelector(s);
  const $$ = (s, ctx = document) => Array.from(ctx.querySelectorAll(s));
  const load = (k) => JSON.parse(localStorage.getItem(k) || '[]');
  const save = (k, v) => localStorage.setItem(k, JSON.stringify(v));

  /* ---------- INDEX (cliente) ---------- */
  const accordionBtn = $('#accordionBtn');
  const accordionPanel = $('#accordionPanel');
  const servicoRows = $$('#servicosTable tbody tr');
  const abrirAgendarBtn = $('#abrirAgendar');
  const modal = $('#modal');
  const modalClose = $('#modalClose');
  const btnVoltarDias = $('#voltarDias');
  const stepDays = $('#stepDays');
  const stepTimes = $('#stepTimes');
  const stepForm = $('#stepForm');
  const daysGrid = $('#daysGrid');
  const timesGrid = $('#timesGrid');
  const selectedDayLabel = $('#selectedDayLabel');
  const chosenInfo = $('#chosenInfo');
  const form = $('#formAgendamento');
  const cancelForm = $('#cancelForm');

  // Histórico do cliente
  const btnHistorico = $('#btnHistorico');
  const modalHistorico = $('#modalHistorico');
  const modalHistoricoClose = $('#modalHistoricoClose');
  const formTelefoneHistorico = $('#formTelefoneHistorico');
  const telefoneHistorico = $('#telefoneHistorico');
  const stepTelefone = $('#stepTelefone');
  const stepHistoricoLista = $('#stepHistoricoLista');
  const tabelaHistoricoCliente = $('#tabelaHistoricoCliente tbody');
  const historicoNomeCliente = $('#historicoNomeCliente');
  const historicoInfo = $('#historicoInfo');
  const voltarTelefone = $('#voltarTelefone');
  const cancelTelefone = $('#cancelTelefone');

  let servicoSelecionado = null;
  let selectedDateISO = null;
  let selectedTime = null;

  // Accordion
  if (accordionBtn && accordionPanel) {
    accordionBtn.addEventListener('click', () => {
      const open = accordionPanel.classList.toggle('open');
      accordionBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
      accordionPanel.setAttribute('aria-hidden', open ? 'false' : 'true');
      const chev = accordionBtn.querySelector('.chev');
      if (chev) chev.style.transform = open ? 'rotate(180deg)' : 'rotate(0deg)';
    });
  }

  // Select service
  if (servicoRows.length) {
    servicoRows.forEach(r => {
      r.addEventListener('click', () => {
        servicoRows.forEach(x => x.classList.remove('selected'));
        r.classList.add('selected');
        servicoSelecionado = {
          nome: r.dataset.servico,
          preco: r.dataset.preco,
          duracao: r.dataset.duracao
        };
      });
    });
  }

  // Open modal (days)
  if (abrirAgendarBtn) {
    abrirAgendarBtn.addEventListener('click', () => {
      if (!servicoSelecionado) return alert('Selecione um serviço primeiro.');
      openModal();
      showStep('days');
    });
  }

  function openModal() {
    modal.classList.add('show');
    modal.setAttribute('aria-hidden', 'false');
    generateDaysGrid();
  }

  function closeModal() {
    modal.classList.remove('show');
    modal.setAttribute('aria-hidden', 'true');
    selectedDateISO = null;
    selectedTime = null;
    showStep('days');
    $$('.day-box').forEach(b => b.classList.remove('selected'));
  }

  if (modalClose) modalClose.addEventListener('click', closeModal);
  if (btnVoltarDias) btnVoltarDias.addEventListener('click', closeModal);

  // Step navigation
  function showStep(step) {
    stepDays.style.display = 'none';
    stepTimes.style.display = 'none';
    stepForm.style.display = 'none';
    if (step === 'days') stepDays.style.display = '';
    if (step === 'times') stepTimes.style.display = '';
    if (step === 'form') stepForm.style.display = '';
  }

  // Generate days grid (next 10 days, excluding Sundays)
  function generateDaysGrid() {
    daysGrid.innerHTML = '';
    const today = new Date();
    let added = 0;
    let i = 0;
    while (added < 10 && i < 20) {
      const d = new Date(today);
      d.setDate(today.getDate() + i);
      const dayOfWeek = d.getDay();
      i++;
      if (dayOfWeek === 0) continue;
      const dd = String(d.getDate()).padStart(2, '0');
      const mm = String(d.getMonth() + 1).padStart(2, '0');
      const iso = `${d.getFullYear()}-${mm}-${dd}`;
      const weekday = d.toLocaleDateString('pt-BR', { weekday: 'long' });
      const box = document.createElement('button');
      box.className = 'day-box';
      box.dataset.iso = iso;
      box.innerHTML = `<div style="line-height:1.1">${dd}/${mm}<br><small style="font-weight:600">${capitalize(weekday)}</small></div>`;
      box.addEventListener('click', () => {
        $$('.day-box').forEach(b => b.classList.remove('selected'));
        box.classList.add('selected');
        selectedDateISO = iso;
        selectedDayLabel.textContent = `${dd}/${mm} — ${capitalize(weekday)}`;
        showTimesForDate(iso);
        showStep('times');
      });
      daysGrid.appendChild(box);
      added++;
    }
  }

  function buildAllSlots() {
    const slots = [];
    for (let h = 8; h <= 20; h++) {
      ['00', '30'].forEach(m => {
        if (h === 20 && m === '30') return;
        const hh = String(h).padStart(2, '0');
        slots.push(`${hh}:${m}`);
      });
    }
    return slots;
  }

  function showTimesForDate(isoDate) {
    const allSlots = buildAllSlots();
    const ag = load('agendamentos') || [];
    const used = ag.filter(a => a.date === isoDate).map(a => a.time);
    const available = allSlots.filter(s => !used.includes(s));
    timesGrid.innerHTML = '';
    if (!available.length) {
      timesGrid.innerHTML = `<p class="muted" style="padding:12px">Nenhum horário disponível nesse dia.</p>`;
      return;
    }
    available.forEach(t => {
      const tb = document.createElement('button');
      tb.className = 'time-box';
      tb.textContent = t;
      tb.addEventListener('click', () => {
        selectedTime = t;
        chosenInfo.textContent = `${servicoSelecionado.nome} — R$${servicoSelecionado.preco} — ${servicoSelecionado.duracao} • ${formatDateBR(isoDate)} ${t}`;
        showStep('form');
        setTimeout(() => { const n = $('#nome'); if (n) n.focus(); }, 80);
      });
      timesGrid.appendChild(tb);
    });
  }

  // confirm appointment
  if (form) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const nome = ($('#nome') || {}).value || '';
      const sobrenome = ($('#sobrenome') || {}).value || '';
      const telefone = ($('#telefone') || {}).value || '';
      if (!nome.trim() || !sobrenome.trim() || !telefone.trim()) {
        return alert('Preencha todos os campos.');
      }
      if (!selectedDateISO || !selectedTime) return alert('Escolha dia e horário.');
      const ag = load('agendamentos');
      const novo = {
        id: Date.now(),
        cliente: `${nome.trim()} ${sobrenome.trim()}`,
        telefone: telefone.trim(),
        servico: servicoSelecionado.nome,
        preco: Number(servicoSelecionado.preco),
        duracao: servicoSelecionado.duracao,
        date: selectedDateISO,
        time: selectedTime,
        status: 'scheduled'
      };
      ag.push(novo);
      save('agendamentos', ag);
      alert(`Agendado: ${novo.cliente} — ${formatDateBR(novo.date)} ${novo.time}`);
      closeModal();
    });
  }

  if (cancelForm) cancelForm.addEventListener('click', () => {
    showStep('times');
  });

  // HISTÓRICO DO CLIENTE
  if (btnHistorico) {
    btnHistorico.addEventListener('click', () => {
      openModalHistorico();
    });
  }

  function openModalHistorico() {
    modalHistorico.classList.add('show');
    modalHistorico.setAttribute('aria-hidden', 'false');
    showStepHistorico('telefone');
    if (telefoneHistorico) telefoneHistorico.value = '';
  }

  function closeModalHistorico() {
    modalHistorico.classList.remove('show');
    modalHistorico.setAttribute('aria-hidden', 'true');
    showStepHistorico('telefone');
  }

  function showStepHistorico(step) {
    stepTelefone.style.display = 'none';
    stepHistoricoLista.style.display = 'none';
    if (step === 'telefone') stepTelefone.style.display = '';
    if (step === 'lista') stepHistoricoLista.style.display = '';
  }

  if (modalHistoricoClose) modalHistoricoClose.addEventListener('click', closeModalHistorico);
  if (cancelTelefone) cancelTelefone.addEventListener('click', closeModalHistorico);

  if (formTelefoneHistorico) {
    formTelefoneHistorico.addEventListener('submit', (e) => {
      e.preventDefault();
      const tel = telefoneHistorico.value.trim();
      if (!tel) return alert('Digite seu telefone.');
      
      const ag = load('agendamentos');
      const meusAgendamentos = ag.filter(a => a.telefone === tel);
      
      if (!meusAgendamentos.length) {
        alert('Nenhum agendamento encontrado para este telefone.');
        return;
      }

      // Pegar o nome do primeiro agendamento
      const nomeCliente = meusAgendamentos[0].cliente;
      historicoNomeCliente.textContent = `Olá, ${nomeCliente}!`;
      historicoInfo.textContent = `Telefone: ${tel}`;

      // Renderizar tabela
      tabelaHistoricoCliente.innerHTML = '';
      meusAgendamentos.sort((a,b) => (b.date + b.time).localeCompare(a.date + a.time));
      
      meusAgendamentos.forEach(a => {
        const tr = document.createElement('tr');
        const statusText = a.status === 'done' ? 'Concluído' : 'Agendado';
        const statusColor = a.status === 'done' ? '#10b981' : '#f59e0b';
        tr.innerHTML = `
          <td>${formatDateBR(a.date)}</td>
          <td>${a.time}</td>
          <td>${a.servico}</td>
          <td>R$ ${Number(a.preco).toFixed(2)}</td>
          <td><span style="color:${statusColor};font-weight:600">${statusText}</span></td>
        `;
        tabelaHistoricoCliente.appendChild(tr);
      });

      showStepHistorico('lista');
    });
  }

  if (voltarTelefone) {
    voltarTelefone.addEventListener('click', () => {
      showStepHistorico('telefone');
    });
  }

  // helper
  function formatDateBR(iso) {
    const [y,m,d] = iso.split('-'); return `${d}/${m}/${y}`;
  }
  function capitalize(s) { return s.charAt(0).toUpperCase() + s.slice(1); }

  // close modal with ESC
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      if (modal.classList.contains('show')) closeModal();
      if (modalHistorico.classList.contains('show')) closeModalHistorico();
    }
  });

  /* ---------- LOGIN ---------- */
  const entrarBtn = $('#entrar');
  if (entrarBtn) entrarBtn.addEventListener('click', () => {
    window.location.href = 'barbeiro.html';
  });

  /* ---------- BARBEIRO ---------- */
  const tabelaBody = $('#tabelaAgendamentos tbody');
  const panelAgenda = $('#panelAgenda');
  const panelHistorico = $('#panelHistorico');
  const tabAgenda = $('#tabAgenda');
  const tabHistorico = $('#tabHistorico');
  const logoutBtn = $('#logout');
  const filtrarHistBtn = $('#filtrarHist');
  const limparFiltroBtn = $('#limparFiltro');
  const histStart = $('#histStart');
  const histEnd = $('#histEnd');
  const tabelaHistoricoBody = $('#tabelaHistorico tbody');
  const histResumo = $('#histResumo');

  function renderAgenda() {
    if (!tabelaBody) return;
    const ag = load('agendamentos').filter(a => a.status !== 'done');
    tabelaBody.innerHTML = '';
    if (!ag.length) {
      tabelaBody.innerHTML = `<tr><td colspan="6" style="color:#6b7280;padding:18px">Sem agendamentos</td></tr>`;
      return;
    }
    ag.sort((a,b) => a.date === b.date ? a.time.localeCompare(b.time) : a.date.localeCompare(b.date));
    const todayISO = (new Date()).toISOString().slice(0,10);
    ag.forEach(a => {
      const tr = document.createElement('tr');
      const btnCell = (a.date === todayISO)
        ? `<button class="btn primary conclude" data-id="${a.id}">Concluir</button>`
        : `<span style="color:#9aa0a6">--</span>`;
      tr.innerHTML = `<td>${formatDateBR(a.date)}</td><td>${a.time}</td><td>${a.cliente}</td><td>${a.servico}</td><td>R$ ${Number(a.preco).toFixed(2)}</td><td>${btnCell}</td>`;
      tabelaBody.appendChild(tr);
    });
    $$('.conclude').forEach(b => b.addEventListener('click', concludeAppointment));
  }

  function concludeAppointment(e) {
    const id = Number(e.currentTarget.dataset.id);
    const ag = load('agendamentos');
    const idx = ag.findIndex(x => x.id === id);
    if (idx === -1) return alert('Agendamento não encontrado');
    const todayISO = (new Date()).toISOString().slice(0,10);
    if (ag[idx].date !== todayISO) return alert('Só é possível concluir no dia do agendamento.');
    ag[idx].status = 'done';
    save('agendamentos', ag);
    alert(`Concluído: ${ag[idx].cliente}`);
    renderAgenda();
  }

  function renderHistorico(filtered = null) {
    if (!tabelaHistoricoBody) return;
    const all = load('agendamentos').filter(a => a.status === 'done');
    let list = all;
    if (filtered && filtered.length) list = filtered;
    tabelaHistoricoBody.innerHTML = '';
    if (!list.length) {
      tabelaHistoricoBody.innerHTML = `<tr><td colspan="4" style="color:#6b7280;padding:12px">Nenhum atendimento no período</td></tr>`;
      histResumo.textContent = '0 atendimentos — R$ 0,00';
      return;
    }
    list.sort((a,b) => (b.date + b.time).localeCompare(a.date + a.time));
    let total = 0;
    list.forEach(a => {
      const tr = document.createElement('tr');
      tr.innerHTML = `<td>${formatDateBR(a.date)}</td><td>${a.cliente}</td><td>${a.servico}</td><td>${Number(a.preco).toFixed(2)}</td>`;
      tabelaHistoricoBody.appendChild(tr);
      total += Number(a.preco);
    });
    histResumo.textContent = `${list.length} atendimento(s) — R$ ${total.toFixed(2)}`;
  }

  if (filtrarHistBtn) {
    filtrarHistBtn.addEventListener('click', () => {
      const start = histStart.value;
      const end = histEnd.value;
      if (!start || !end) return alert('Escolha início e fim do período.');
      if (start > end) return alert('Data inicial deve ser anterior ou igual à final.');
      const all = load('agendamentos').filter(a => a.status === 'done');
      const filtered = all.filter(a => a.date >= start && a.date <= end);
      renderHistorico(filtered);
    });
  }
  if (limparFiltroBtn) {
    limparFiltroBtn.addEventListener('click', () => {
      histStart.value = ''; histEnd.value = '';
      renderHistorico();
    });
  }

  if (tabAgenda) tabAgenda.addEventListener('click', () => { panelAgenda.style.display = ''; panelHistorico.style.display = 'none'; });
  if (tabHistorico) tabHistorico.addEventListener('click', () => { panelAgenda.style.display = 'none'; panelHistorico.style.display = ''; renderHistorico(); });

  if (logoutBtn) logoutBtn.addEventListener('click', () => window.location.href = 'index.html');

  if (tabelaBody) renderAgenda();
  if (tabelaHistoricoBody) renderHistorico();

})();