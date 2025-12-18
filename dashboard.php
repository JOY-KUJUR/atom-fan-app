<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atomberg Fan Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            atomDark: '#0b0b0b',
            atomCard: '#161616',
            atomYellow: '#f5c542'
          }
        }
      }
    }
  </script>

  <style>
    @keyframes spinFan {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }
    .fan-on { animation: spinFan 1.5s linear infinite; }
    .fan-off { opacity: 0.3; }

    /* Premium Range Slider Styling */
    input[type=range]::-webkit-slider-thumb {
      -webkit-appearance: none;
      height: 24px;
      width: 24px;
      border-radius: 50%;
      background: #f5c542;
      cursor: pointer;
      margin-top: -8px;
      box-shadow: 0 0 10px rgba(245, 197, 66, 0.4);
    }
  </style>
</head>

<body class="bg-gray-100 text-gray-900 dark:bg-atomDark dark:text-white min-h-screen font-sans">

<nav class="sticky top-0 z-40 bg-white/80 dark:bg-atomDark/80 backdrop-blur-md border-b border-gray-200 dark:border-white/10 px-4 md:px-10 py-4">
  <div class="max-w-7xl mx-auto flex items-center justify-between">
    <div class="flex flex-col">
      <h1 class="text-base md:text-xl font-bold tracking-tight text-gray-800 dark:text-white">Atomberg Controller</h1>
      <span class="text-[10px] md:text-xs text-gray-500 uppercase font-semibold">Smart Home Dashboard</span>
    </div>

    <button onclick="toggleTheme()" class="p-2.5 rounded-xl bg-gray-100 dark:bg-white/5 hover:bg-gray-200 dark:hover:bg-white/10 transition-all border border-transparent dark:border-white/10">
      <svg id="themeIcon" xmlns="http://www.w3.org/2000/01/svg" class="h-5 w-5 text-atomYellow" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 18v1m9-9h1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707M16.242 16.242l.707.707M7.758 7.758l.707.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
      </svg>
    </button>
  </div>
</nav>

<main class="max-w-7xl mx-auto p-4 md:p-10">
  <div class="flex gap-6 text-sm font-medium mb-8 overflow-x-auto pb-2 scrollbar-hide border-b border-gray-200 dark:border-white/10">
    <button class="text-atomYellow border-b-2 border-atomYellow pb-2 whitespace-nowrap">All Devices</button>
  
  </div>

  <div id="fans" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6">
    </div>
</main>

<div id="modal" class="fixed inset-0 bg-black/70 backdrop-blur-sm hidden flex-col justify-end md:justify-center items-center z-50 p-0 md:p-4 opacity-0 transition-opacity duration-300">
  
  <div class="bg-white dark:bg-atomCard w-full md:max-w-md rounded-t-[2.5rem] md:rounded-[2rem] p-6 md:p-8 shadow-2xl transition-transform duration-300 translate-y-full md:translate-y-0" id="modalContent">
    
    <div class="w-12 h-1 bg-gray-300 dark:bg-gray-700 rounded-full mx-auto mb-6 md:hidden"></div>

    <div class="flex justify-between items-start mb-6">
      <div>
        <h2 id="modalTitle" class="text-xl md:text-2xl font-bold">Fan Name</h2>
        <p id="modalRoom" class="text-sm text-gray-500 dark:text-gray-400 font-medium"></p>
      </div>
      <button onclick="closeModal()" class="hidden md:block p-2 text-gray-400 hover:text-gray-600 dark:hover:text-white">✕</button>
    </div>

    <button id="powerBtn" class="w-full py-4 rounded-2xl bg-atomYellow hover:bg-yellow-500 text-black font-bold text-lg transition-all active:scale-[0.98] mb-6 flex items-center justify-center gap-2">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
      <span id="powerBtnText">Toggle Power</span>
    </button>

    <div class="mb-8 space-y-4">
      <div class="flex justify-between items-center">
        <label class="text-xs font-bold uppercase tracking-widest text-gray-500">Speed Level</label>
        <span id="speedValueDisplay" class="text-atomYellow font-bold text-xl">1</span>
      </div>
      <input id="modalSpeed" type="range" min="1" max="6" step="1" 
        class="w-full h-2 bg-gray-200 dark:bg-gray-800 rounded-lg appearance-none cursor-pointer accent-atomYellow">
      <div class="flex justify-between text-[10px] text-gray-400 font-black px-1">
        <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span>
      </div>
    </div>

    <div class="grid grid-cols-2 gap-4 mb-6">
      <button id="sleepBtn" class="py-4 px-2 rounded-2xl bg-gray-50 dark:bg-white/5 font-bold text-sm hover:bg-gray-200 dark:hover:bg-white/10 transition-all border border-gray-100 dark:border-white/5">
        🌙 Sleep Mode
      </button>
     
    </div>
    <!-- POWER CONSUMPTION -->
<div class="mt-4 text-sm text-gray-600 dark:text-gray-300">
  <p>
    Energy Used:
    <span id="energyUnits" class="font-semibold">0</span> units
  </p>
  <p>
    Estimated Cost:
    <span id="energyCost" class="font-semibold">₹0</span>
  </p>
</div>

    <button onclick="closeModal()" class="md:hidden w-full py-4 text-gray-400 font-bold text-sm uppercase tracking-widest">
      Close Panel
    </button>
  </div>
</div>

<script>
let currentFan = null;
const modal = document.getElementById("modal");
const modalContent = document.getElementById("modalContent");

// 1. FETCH DATA
function loadFans() {
  fetch("api/fans.php")
  .then(res => res.json())
  .then(data => {
    let html = "";
    data.forEach(fan => {
      const isOn = fan.is_on == 1;
      html += `
      <div onclick='openModal(${JSON.stringify(fan)})'
        class="bg-white dark:bg-atomCard rounded-[2rem] p-5
               flex flex-row items-center gap-5
               shadow-sm hover:shadow-xl transition-all duration-300 cursor-pointer 
               group border border-transparent hover:border-atomYellow/50">

        <div class="relative flex-shrink-0">
          <div class="w-16 h-16 flex items-center justify-center rounded-2xl
                      ${isOn ? 'bg-atomYellow/10' : 'bg-gray-50 dark:bg-black'} 
                      transition-colors duration-500">
            <svg viewBox="0 0 100 100"
              class="w-10 h-10 transition-all duration-500
              ${isOn ? 'fill-atomYellow fan-on' : 'fill-gray-400 fan-off'}">
              <circle cx="50" cy="50" r="6"/>
              <path d="M50 10 C65 10,70 25,60 35 C55 40,50 38,50 35Z"/>
              <path d="M90 50 C90 65,75 70,65 60 C60 55,62 50,65 50Z"/>
              <path d="M50 90 C35 90,30 75,40 65 C45 60,50 62,50 65Z"/>
              <path d="M10 50 C10 35,25 30,35 40 C40 45,38 50,35 50Z"/>
            </svg>
          </div>
          ${isOn ? '<span class="absolute -top-1 -right-1 flex h-3 w-3"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-atomYellow opacity-75"></span><span class="relative inline-flex rounded-full h-3 w-3 bg-atomYellow"></span></span>' : ''}
        </div>

        <div class="flex-1 min-w-0">
          <p class="font-bold text-lg truncate">${fan.fan_name}</p>
          <p class="text-xs text-gray-500 uppercase tracking-wide font-bold">${fan.room}</p>
          <div class="flex items-center gap-2 mt-2">
             <span class="px-2 py-0.5 rounded-md bg-gray-100 dark:bg-white/5 text-[10px] font-black tracking-tighter">SPD ${fan.speed}</span>
             ${fan.sleep_mode == 1 ? '<span class="text-[10px] bg-indigo-100 dark:bg-indigo-900/30 px-1.5 rounded text-indigo-500">🌙 SLEEP</span>' : ''}
          </div>
        </div>

        <div class="p-2">
          <div class="w-2.5 h-2.5 rounded-full ${isOn ? 'bg-atomYellow shadow-[0_0_8px_#f5c542]' : 'bg-gray-300 dark:bg-gray-800'}"></div>
        </div>
      </div>`;
    });
    document.getElementById("fans").innerHTML = html;
  });
}
const UNIT_RATE = 7;

function updateEnergyUI(fan) {
  if (!fan.power_watt || !fan.hours_used) return;

  const units = (fan.power_watt * fan.hours_used) / 1000;
  const cost = units * UNIT_RATE;

  document.getElementById("energyUnits").innerText = units.toFixed(2);
  document.getElementById("energyCost").innerText = "₹" + cost.toFixed(2);
}

// 2. OPEN MODAL & SET STATE
function openModal(fan) {
  currentFan = fan;
  
  document.getElementById("modalTitle").innerText = fan.fan_name;
  document.getElementById("modalRoom").innerText = fan.room;
  document.getElementById("modalSpeed").value = fan.speed;
  document.getElementById("speedValueDisplay").innerText = fan.speed;
  
  const pBtnText = document.getElementById("powerBtnText");
  pBtnText.innerText = fan.is_on == 1 ? "Turn OFF" : "Turn ON";

  const sleepBtn = document.getElementById("sleepBtn");
  sleepBtn.classList.toggle("bg-indigo-500", fan.sleep_mode == 1);
  sleepBtn.classList.toggle("text-white", fan.sleep_mode == 1);

  // Set click events
  document.getElementById("powerBtn").onclick = () => {
    control(currentFan.id, 'power', currentFan.is_on == 1 ? 0 : 1);
  };

  document.getElementById("sleepBtn").onclick = () => {
    control(currentFan.id, 'sleep', currentFan.sleep_mode == 1 ? 0 : 1);
  };

  document.getElementById("modalSpeed").oninput = (e) => {
    document.getElementById("speedValueDisplay").innerText = e.target.value;
  };
  
  document.getElementById("modalSpeed").onchange = (e) => {
    control(currentFan.id, 'speed', e.target.value);
  };

  // Show Modal
  modal.classList.remove("hidden");
  modal.classList.add("flex");
  
    updateEnergyUI(fan);
    
    
  setTimeout(() => {
    modal.style.opacity = "1";
    modalContent.style.transform = "translateY(0)";
  }, 10);
  


}

// 3. CLOSE MODAL
function closeModal() {
  modal.style.opacity = "0";
  modalContent.style.transform = window.innerWidth < 768 ? "translateY(100%)" : "translateY(20px)";
  setTimeout(() => {
    modal.classList.add("hidden");
    modal.classList.remove("flex");
  }, 300);
}

// 4. CONTROL ACTION
function control(id, action, value) {
  fetch("api/control.php", {
    method: "POST",
    headers: {"Content-Type":"application/x-www-form-urlencoded"},
    body: `fan_id=${id}&action=${action}&value=${value}`
  }).then(() => {
    // Optimistic UI update or reload
    location.reload(); 
  });
}

// 5. THEME MANAGEMENT
function toggleTheme() {
  document.documentElement.classList.toggle("dark");
  localStorage.setItem("theme", document.documentElement.classList.contains("dark") ? "dark" : "light");
}

(function init() {
  if (localStorage.getItem("theme") === "dark" || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add("dark");
  }
  loadFans();
})();
</script>

</body>
</html>