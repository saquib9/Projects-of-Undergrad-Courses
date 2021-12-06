const studentsData = [
  {
    "name": "Coleen Sanford",
    "location": {
      "latitude": -60.489023,
      "longitude": -32.311668
    }
  },
  {
    "name": "Bethany Church",
    "location": {
      "latitude": -1.304805,
      "longitude": -80.670287
    }
  },
  {
    "name": "Kristy Ware",
    "location": {
      "latitude": -46.443562,
      "longitude": -46.426997
    }
  },
  {
    "name": "Avery Navarro",
    "location": {
      "latitude": 35.719469,
      "longitude": -172.783006
    }
  },
  {
    "name": "Robyn Cruz",
    "location": null
  },
  {
    "name": "Vinson Hays",
    "location": null
  }
];

document.getElementById("app").innerHTML = 
    <h1 class="app-title">Pets (${studentsData.length}result)</h1>
