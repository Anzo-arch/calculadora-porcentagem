import {
  calcPerc,
  calcAum,
  calcDesc,
  calcVar,
  calcR3
} from './calculations.js';

const content = document.getElementById('content');
const tabs = document.querySelectorAll('.tab-btn');

export function initUI() {
  initTabs();
  initDarkMode();
  renderTab('calcular');
}

function initTabs(){
  tabs.forEach(btn => {
    btn.addEventListener('click', () => {
      tabs.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      renderTab(btn.dataset.tab);
    });
  });
}

function initDarkMode(){
  document.getElementById('darkToggle')
    .addEventListener('click', () => {
      document.documentElement.classList.toggle('dark');
    });
}

const input = placeholder => `
<input type="number" placeholder="${placeholder}"
class="w-full p-3 border-2 border-gray-200 dark:border-gray-700 
rounded-lg bg-white dark:bg-gray-800 text-gray-800 dark:text-white
focus:ring-2 focus:ring-blue-500 outline-none">
`;

const button = (text, action) => `
<button data-action="${action}"
class="w-full mt-4 bg-blue-600 hover:bg-blue-700 text-white font-bold
py-3 rounded-lg transition hover:scale-[1.02]">
${text}
</button>
`;

export function renderTab(tab){
  const layouts = {
    calcular: `
      ${input('Valor base')}
      ${input('Porcentagem (%)')}
      ${button('Calcular','perc')}
      <div id="r"></div>
    `,
    aumento: `
      ${input('Valor base')}
      ${input('Porcentagem (%)')}
      ${button('Calcular aumento','aum')}
      <div id="r"></div>
    `,
    desconto: `
      ${input('Valor base')}
      ${input('Porcentagem (%)')}
      ${button('Calcular desconto','desc')}
      <div id="r"></div>
    `,
    variacao: `
      ${input('Valor antigo')}
      ${input('Valor novo')}
      ${button('Calcular variação','var')}
      <div id="r"></div>
    `,
    regratres: `
      ${input('Valor A')}
      ${input('Valor B')}
      ${input('Valor C')}
      ${button('Calcular','r3')}
      <div id="r"></div>
    `
  };

  content.innerHTML = layouts[tab];
  bindActions();
}

function bindActions(){
  content.querySelector('button')
    .addEventListener('click', e => {
      const action = e.target.dataset.action;
      const inputs = [...content.querySelectorAll('input')].map(i => +i.value);
      const r = document.getElementById('r');

      const map = {
        perc: () => calcPerc(inputs, r),
        aum: () => calcAum(inputs, r),
        desc: () => calcDesc(inputs, r),
        var: () => calcVar(inputs, r),
        r3: () => calcR3(inputs, r),
      };

      map[action]?.();
    });
}
