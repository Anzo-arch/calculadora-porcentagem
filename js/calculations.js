const error = () => `
<div class="mt-4 bg-red-50 dark:bg-red-900 text-red-700 dark:text-red-200
border-l-4 border-red-500 p-4 rounded-lg">
Preencha todos os campos corretamente
</div>
`;

const result = html => `
<div class="mt-6 bg-green-50 dark:bg-green-900 border-l-4 border-green-500
p-5 rounded-lg animate-fade text-center text-3xl font-bold">
${html}
</div>
`;

const moeda = v =>
  v.toLocaleString('pt-BR',{style:'currency',currency:'BRL'});

export function calcPerc([v,p], r){
  if(!v||!p) return r.innerHTML=error();
  r.innerHTML=result(moeda(v*(p/100)));
}

export function calcAum([v,p], r){
  if(!v||!p) return r.innerHTML=error();
  r.innerHTML=result(moeda(v + v*(p/100)));
}

export function calcDesc([v,p], r){
  if(!v||!p) return r.innerHTML=error();
  r.innerHTML=result(moeda(v - v*(p/100)));
}

export function calcVar([a,n], r){
  if(!a||!n) return r.innerHTML=error();
  r.innerHTML=result(`${(((n-a)/a)*100).toFixed(2)}%`);
}

export function calcR3([a,b,c], r){
  if(!a||!b||!c) return r.innerHTML=error();
  r.innerHTML=result(`X = ${(b*c/a).toFixed(2)}`);
}
